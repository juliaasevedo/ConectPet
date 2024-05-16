@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Nova Vacina') }}</div>
                <div class="card-body"> 
                    <form method="POST" action="{{ url('/vacina/save') }}">
                        @csrf
                        <div class="row form-group">
                            <label for="name" class="col-md-1 col-form-label text-md-right">Nome:</label>
                            <div class="col-md-11">
                                <input type="text" id="name" class="form-control" name="name" required>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="lote" class="col-md-1 col-form-label text-md-right">Lote:</label>
                            <div class="col-md-3">
                                <input type="text" id="lote" class="form-control" name="lote" required>
                            </div>
                            <label for="dose" class="col-md-1 col-form-label text-md-right">Dose:</label>
                            <div class="col-md-3">    
                                <input type="number" id="dose" class="form-control" name="dose" min="1" max="6" required>
                            </div>
                            <label for="dataValidade" class="col-md-1 col-form-label text-md-right">Data de Validade:</label>
                            <div class="col-md-3">    
                                <input type="date" id="dataValidade" class="form-control" name="dataValidade" required>
                            </div>

                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
