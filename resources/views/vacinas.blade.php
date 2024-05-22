@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6"></div>
    @if(Auth::user()->level == 2)
    <div class="col-md-6">
       <a class="btn btn-primary" href="{{ url('/cadastro_vacina') }}" role="button">Cadastrar Vacina</a>
    </div>
    @endif
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8" id="tabelapets">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body"> 
                    <table class="table text-center" id="tabela">
                        <thead>
                            <tr>
                                <th class="col-md-3">Nome</th>
                                <th class="col-md-3">Dose</th>
                                <th class="col-md-3">Lote</th>
                                <th class="col-md-3">Data de Validade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vacinas as $vacina)
                            <tr>
                                <td class="col-md-3">{{$vacina->name}}</td>
                                <td class="col-md-3">{{$vacina->dose}}</td>
                                <td class="col-md-3">{{$vacina->lote}}</td>
                                <td class="col-md-3">{{ date('d/m/Y', strtotime($vacina->dataValidade))}}</td>                             
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tabela').DataTable();
 
    });
</script>
@endsection
