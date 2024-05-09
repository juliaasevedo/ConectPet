<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\pet;
use App\Models\User;


class PetController extends Controller
{
    public function index()
    {
        $pets = pet::orderBy('id')->get();
        $pessoas = User::orderBy('id')->get();
        return view('pets', compact ('pets', 'pessoas'));
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
}
