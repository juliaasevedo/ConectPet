@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
       <a class="btn btn-primary" href="{{ url('/cadastro_pet') }}" role="button">Cadastrar Pet</a>
    </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body"> 
                    <table class="table" id="tabela">
                        <thead>
                            <tr>
                                <th class="col-md-2">Nome</th>
                                <th class="col-md-2">Tipo</th>
                                <th class="col-md-2">Raça</th>
                                <th class="col-md-2">Veterinário</th>
                                <th class="col-md-2">Proprietário</th>
                                <th class="col-md-2">Exibir cartão de vacinas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-2">batata1</td>
                                <td class="col-md-2">batata1</td>
                                <td class="col-md-2">batata1</td>
                                <td class="col-md-2">batata1</td>
                                <td class="col-md-2">batata1</td>
                                <td class="col-md-2">batata1</td>
                            </tr>
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
