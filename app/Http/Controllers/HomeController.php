<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pessoas = User::orderBy('id')->get();
        return view('home', compact('pessoas'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('user_update', compact('user'));
    }
    public function home()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function update(User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'level' => 'required|not_in:0',
            'password' => 'required|min:6|confirmed'
        ];
    
        if (request('level') == 2) {
            $rules['crmv'] = 'required';
        }
    
        $messages = [
            'crmv.required' => 'O CRMV é obrigatório para veterinários.',
        ];
    
        $validator = Validator::make(request()->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('mensagem-erro', 'Erro ao salvar o registro. ' . $validator->errors()->first('crmv'));
        }
    
        $user->name = request('name');
        $user->email = request('email');
        $user->level = request('level');
        $user->crmv = request('crmv');
        $user->password = bcrypt(request('password'));
    
        try {
            $user->save();
        } catch (QueryException $e) {
            session()->flash('mensagem-erro', 'Erro ao salvar o registro.');
            return redirect()->back();
        }
    
        session()->flash('mensagem-sucesso', 'Dados alterados com sucesso!');
        return redirect()->back();
    }
}
