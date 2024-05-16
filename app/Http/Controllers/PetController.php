<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\pet;
use App\Models\User;
use App\Models\Atendimento;
use App\Models\Vacina;


class PetController extends Controller
{
    public function index()
    {
        $pets = pet::orderBy('id')->get();
        $pessoas = User::orderBy('id')->get();
        return view('pets', compact('pets', 'pessoas'));
    }
    public function cadastroPet()
    {
        $pets = pet::orderBy('id')->get();
        $pessoas = User::orderBy('id')->get();
        return view('cadastroPet', compact('pets', 'pessoas'));
    }
    public function store(Request $request)
    {
        $data = [
            'name' => request('name'),
            'proprietario' => request('proprietario'),
            'tipo' => request('tipo'),
            'raca' => request('raca'),
            'veterinario' => request('vet'),
            
           
        ];
        try {
            pet::create($data);
        } catch (QueryException $e) {
            session()->flash('mensagem-erro', 'Erro ao salvar o registro.');
            return redirect()->back();
        }

        session()->flash('mensagem-sucesso', 'Dados inseridos com sucesso!');

        return redirect()->back();

    }
    public function editPet($id)
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
        return view('editPet', compact('pet', 'vacinas', 'veterinarios', 'vacinasAplicadas', 'proprietarios'));
    }
    public function updatePet(Request $request, pet $id)
    {
        $id->name = request('name');
        $id->tipo = request('tipo');
        $id->raca = request('raca');

        try{
            $id->save();
        }catch (QueryException $e) {
            session()->flash('mensagem-erro', 'Erro ao salvar o registro.');
            return redirect()->back();
        }

        session()->flash('mensagem-sucesso', 'Dados inseridos com sucesso!');

        return redirect()->back();
    }
}
