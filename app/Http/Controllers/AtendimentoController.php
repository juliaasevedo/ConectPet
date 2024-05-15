<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pet;
use App\Models\Vacina;
use App\Models\Atendimento;
use App\Models\User;

class AtendimentoController extends Controller
{
    public function index($id)
    {
        $vacinas = Vacina::orderBy('id')->get();
        $pet = pet::where('id','=', $id)->get();
        return view('registroVacina', compact('pet','vacinas'));
    }
    public function store(Request $request)
    {
        $data = [
            'pet' => request('pet'),
            'vacina' => request('vacina'),
            'veterinario' => request('veterinario'),
           
        ];
        try {
            Atendimento::create($data);
        } catch (QueryException $e) {
            session()->flash('mensagem-erro', 'Erro ao salvar o registro.');
            return redirect()->back();
        }

        session()->flash('mensagem-sucesso', 'Dados inseridos com sucesso!');

        return redirect()->back();

    }
    public function cartaoVacina($id)
    {
        $pet = pet::where('id','=', $id)->get();
        $vacinasAplicadas = Atendimento::where('pet', '=', $id)->get();
        $vetIds = $vacinasAplicadas->pluck('veterinario')->toArray();
        $veterinarios = User::whereIn('id', $vetIds)->get();
        $vacinaIds = $vacinasAplicadas->pluck('vacina')->toArray();
        $vacinas = Vacina::whereIn('id', $vacinaIds)->get();
        return view('cartaoVacina', compact('pet', 'vacinas', 'veterinarios'));
    }
}
