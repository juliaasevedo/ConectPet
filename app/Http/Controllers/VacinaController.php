<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacina;
use Carbon\Carbon;

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
        'dataValidade' => request('dataValidade'),
      ];
      $validade = Carbon::parse($data['dataValidade']);
            if ($validade->isPast()) {
                session()->flash('mensagem-erro', 'A data de validade não pode ser anterior à data atual.');
                return redirect()->back()->withInput();
            }

      $existeLote = Vacina::where('lote', $data['lote'])->first();

      if ($existeLote){
        session()->flash('mensagem-erro', 'Erro o lote ja existe.');
        return redirect()->back();
      }
      try {
          Vacina::create($data);
      } catch (QueryException $e) {
        session()->flash('mensagem-erro', 'Erro ao salvar registro.');
        return redirect()->back();
      }
      session()->flash('mensagem-sucesso', 'Dados inseridos com sucesso!');
      return redirect()->route('vacinas');
    }
}
