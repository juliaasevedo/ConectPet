@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-auto" id="tabelapets">
            <div class="card">
                <div class="card-header">{{ __('Registrar Nova Vacina') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/vacina/registro/save') }}">
                        @csrf
                        @foreach($pet as $pet)
                        <div class="row form-group">
                            <label for="pet" class="col-md-1 col-form-label text-md-right">Pet:</label>
                            <div class="col-md-11">
                                <input type="hidden" id="pet" class="form-control" name="pet" required readonly value='{{ $pet->id }}'>
                                <input type="text" id="" class="form-control" name="" required readonly value='{{ $pet->name }}'>
                            </div>
                        </div>
                        <br>
                        @endforeach
                        <div class="row form-group">
                            <label for="vacina" class="col-md-1 col-form-label text-md-right">Vacina:<span style="color: red;">*</span></label>
                            <div class="col-md-3">
                                <select name="vacina" id="vacina" class="form-control">
                                    <option value="0" selected>Selecione uma opção...</option>
                                    @foreach($vacinas as $vacina)
                                    <option value="{{ $vacina->id }}">{{$vacina->name}} - Lote: {{$vacina->lote}} - Validade: {{ date('d/m/Y', strtotime($vacina->dataValidade)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="veterinario" class="col-md-1 col-form-label text-md-right">Veterinário:</label>
                            <div class="col-md-2">
                                <input type="hidden" id="veterinario" class="form-control" name="veterinario" required value="{{Auth::user()->id}}">
                                <input type="text" id="" class="form-control" name="" required readonly value="{{Auth::user()->name}}">
                            </div>
                            <label for="poxAplicacao" class="col-md-2 col-form-label text-md-right">Proxima Aplicação:<span style="color: red;">*</span></label>
                            <div class="col-md-3">
                                <input type="date" id="proxAplicacao" class="form-control" name="proxAplicacao">
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="" class="col-md-12 col-form-label text-md-right"><span style="color: red;">*Campos obrigatórios</span></label>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-5">

                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>
                            <div class="col-md-5">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection