<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pet;
use App\Models\Vacina;
use App\Models\Atendimento;
use App\Models\User;
use Carbon\Carbon;

class AtendimentoController extends Controller
{
    public function index($id)
    {
        $vacinas = Vacina::orderBy('id')->get();
        $pet = pet::where('id', '=', $id)->get();
        return view('registroVacina', compact('pet', 'vacinas'));
    }
    public function store(Request $request)
    {
        $data = [
            'pet' => request('pet'),
            'vacina' => request('vacina'),
            'veterinario' => request('veterinario'),
            'proxAplicacao' => request('proxAplicacao'),
        ];

        $dataAtual = Carbon::now();
        $vacina = Vacina::find($data['vacina']);
        if ($vacina) {
            $dataValidade = Carbon::parse($vacina->dataValidade);
            if ($dataAtual->greaterThan($dataValidade)) {
                session()->flash('mensagem-erro', 'Erro: Vacina vencida.');
                return redirect()->back();
            }
            $proximaAplicacao = Carbon::parse($data['proxAplicacao']);
            if ($proximaAplicacao->isPast()) {
                session()->flash('mensagem-erro', 'A data da próxima aplicação não pode ser anterior à data atual.');
                return redirect()->back()->withInput();
            }
        } else {
            session()->flash('mensagem-erro', 'Erro: Vacina não encontrada.');
            return redirect()->back();
        }
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
        $pet = pet::where('id', '=', $id)->get();
        $vacinasAplicadas = Atendimento::where('pet', '=', $id)->get();
        $vetIds = $vacinasAplicadas->pluck('veterinario')->toArray();
        $veterinarios = User::whereIn('id', $vetIds)->get();
        $vacinaIds = $vacinasAplicadas->pluck('vacina')->toArray();
        $vacinas = Vacina::whereIn('id', $vacinaIds)->get();
        $propIds = $pet->pluck('proprietario')->toArray();
        $proprietarios = User::whereIn('id', $propIds)->get();
        //dd($vacinasAplicadas, $veterinarios, $vacinas);
        //dd($pet);
        return view('cartaoVacina', compact('pet', 'vacinas', 'veterinarios', 'vacinasAplicadas', 'proprietarios'));
    }
}
