@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Nova Vacina') }}</div>
                <div class="card-body"> 
                    <form method="POST" action="{{ url('/vacina/registro/save') }}">
                        @csrf
                        @foreach($pet as $batata)
                        <div class="row form-group">
                            <label for="pet" class="col-md-1 col-form-label text-md-right">Pet:</label>
                            <div class="col-md-11">
                                <input type="text" id="pet" class="form-control" name="pet" required value='{{ $batata->name }}'>
                            </div>
                        </div>
                        <br>
                        @endforeach
                        <div class="row form-group">
                            <label for="vacina" class="col-md-1 col-form-label text-md-right">Vacina:</label>
                            <div class="col-md-3">
                                <select name="vacina" id="vacina" class="form-control">
                                    <option value="0" selected>Selecione uma opção...</option>
                                    <option value="1">Gato</option>
                                    <option value="2">Cachorro</option>
                                </select>
                            </div>
                            <label for="veterinario" class="col-md-1 col-form-label text-md-right">Veterinário:</label>
                            <div class="col-md-5">    
                                <input type="text" id="veterinario" class="form-control" name="veterinario" required value="">
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
