@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-auto" id="tabelapets">
            <div class="card">
                <div class="card-header">Editar informação de {{$pet[0]->name}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('edit.pet.save', ['pet' => $pet[0]->id]) }}">
                        @csrf
                        @foreach($pet as $pet)
                        <div class="row form-group">
                            <label for="name" class="col-md-1 col-form-label text-md-right">Nome:</label>
                            <div class="col-md-3">
                                <input type="text" id="name" class="form-control" name="name" required value="{{$pet->name}}">
                            </div>
                            <label for="tipo" class="col-md-1 col-form-label text-md-right">Tipo:</label>
                            <div class="col-md-3">
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="1" @if ($pet->tipo == 1 ) selected @endif >Gato</option>
                                    <option value="2" @if ($pet->tipo != 1 ) selected @endif >Cachorro</option>
                                </select>
                            </div>
                            <label for="raca" class="col-md-1 col-form-label text-md-right">Raça:</label>
                            <div class="col-md-3">
                                <input type="text" id="raca" class="form-control" name="raca" required value="{{$pet->raca}}">
                            </div>

                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="vet" class="col-md-1 col-form-label text-md-right">Veterinário:</label>
                            <div class="col-md-5">
                                <select name="vet" id="vet" class="form-control">
                                    <option value="" selected>Selecione o veterinário...</option>
                                    @foreach($pessoas as $pessoa)
                                    @if($pessoa->level == 2)
                                    <option value="{{$pessoa->id}}">{{$pessoa->name}} / crmv: {{$pessoa->crmv}}</option>
                                    @endif
                                    @endforeach

                                </select>
                            </div>
                            <label for="proprietario" class="col-md-1 col-form-label text-md-right">Proprietário:</label>
                            <div class="col-md-5">
                                <input type="text" id="proprietario" class="form-control" name="proprietario" required readonly value="{{$proprietarios[0]->name}}">
                            </div>
                        </div>
                        @endforeach
                        <br>
                        <div class="row form-group">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success w-100" type="submit">Salvar</button>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection