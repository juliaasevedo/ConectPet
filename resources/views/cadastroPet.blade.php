@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-auto" id="tabelapets">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Novo Pet') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/pet/save') }}">
                        @csrf
                        <div class="row form-group">
                            <label for="name" class="col-md-1 col-form-label text-md-right">Nome: <span style="color: red;">*</span></label>
                            <div class="col-md-5">
                                <input type="text" id="name" class="form-control" name="name" required>
                            </div>
                            <label for="proprietario" class="col-md-1 col-form-label text-md-right">Proprietário:</label>
                            <div class="col-md-5">
                                <input type="hidden" id="proprietario" class="form-control" name="proprietario" required value="{{ Auth::user()->id }}">
                                <input type="text" id="" class="form-control" name="" required readonly value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="tipo" class="col-md-1 col-form-label text-md-right">Tipo:<span style="color: red;">*</span></label>
                            <div class="col-md-3">
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="" selected>Selecione uma opção...</option>
                                    <option value="1">Gato</option>
                                    <option value="2">Cachorro</option>
                                </select>
                            </div>
                            <label for="raca" class="col-md-1 col-form-label text-md-right">Raça:<span style="color: red;">*</span></label>
                            <div class="col-md-2">
                                <input type="text" id="raca" class="form-control" name="raca" required>
                            </div>
                            <label for="vet" class="col-md-1 col-form-label text-md-right">Veterinário:<span style="color: red;">*</span></label>
                            <div class="col-md-4">
                                <select name="vet" id="vet" class="form-control">
                                    <option value="" selected>Selecione o veterinário...</option>
                                    @foreach($pessoas as $pessoa)
                                    @if($pessoa->level == 2)
                                    <option value="{{$pessoa->id}}">{{$pessoa->name}} / crmv: {{$pessoa->crmv}}</option>
                                    @endif
                                    @endforeach

                                </select>
                            </div>
                            <label for="" class="col-md-12 col-form-label text-md-right"><span style="color: red;">*Campos obrigatórios</span></label>
                        </div>
                        <br>


                        <div class="row">
                            <div class="col-md-9">

                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success btn-secundary w-100 shadow-sm" type="submit">Salvar</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection