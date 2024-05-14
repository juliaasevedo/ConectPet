<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacina;

class VacinaController extends Controller
{
    public function index()
    {
        $vacinas = Vacina::orderBy('id')->get();
        return view('vacinas', compact('vacinas'));
    }

    public function store(Request $request)
    {
      $data=[
        'name' => request('name'),
        'dose' => request('dose'),
        'lote' => request('lote'),
      ];
      try {
          Vacina::create($data);
      } catch (QueryException $e) {
        session()->flash('mensagem-erro', 'Erro ao salvar registro.');
        return redirect()->back();
      }
      session()->flash('mensagem-sucesso', 'Dados inseridos com sucesso!');
      return redirect()->back();
    }
}
