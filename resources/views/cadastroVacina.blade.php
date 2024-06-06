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
                            <label for="name" class="col-md-2 col-form-label text-md-right">Nome da Vacina:<span style="color: red;">*</span></label>
                            <div class="col-md-10 px-0">
                                <input type="text" id="name" class="form-control" name="name" required>
                            </div>

                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="lote" class="col-md-1 col-form-label text-md-right">Lote:<span style="color: red;">*</span></label>
                            <div class="col-md-2">
                                <input type="text" id="lote" class="form-control" name="lote" required>
                            </div>
                            <label for="dose" class="col-md-1 col-form-label text-md-right">Dose:<span style="color: red;">*</span></label>
                            <div class="col-md-2">
                                <input type="number" id="dose" class="form-control" name="dose" min="1" max="6" required>
                            </div>
                            <label for="dataValidade" class="col-md-3 col-form-label text-md-right">Data de Validade:<span style="color: red;">*</span></label>
                            <div class="col-md-3">
                                <input type="date" id="dataValidade" class="form-control" name="dataValidade" required>
                            </div>

                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="" class="col-md-12 col-form-label text-md-right"><span style="color: red;">*Campos obrigatórios</span></label>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button class="btn btn-success w-100" type="submit">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection