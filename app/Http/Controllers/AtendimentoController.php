<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pet;

class AtendimentoController extends Controller
{
    public function index()
    {
        
    }
    public function store($id)
    {
        $pet = pet::where('id','=', $id)->get();
        return view('registroVacina', compact('pet'));
    }
}
