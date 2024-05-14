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
                    <table class="table text-center" id="tabela">
                        <thead>
                            <tr>
                                <th class="col-md-2">Nome</th>
                                <th class="col-md-1">Tipo</th>
                                <th class="col-md-2">Raça:</th>
                                <th class="col-md-2">Veterinário</th>
                                <th class="col-md-2">Proprietário</th>
                                <th class="col-md-1">Cartão de vacinas</th>
                                <th class="col-md-2">Registrar Vacina</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pets as $pet)
                            <tr>
                                <td class="col-md-2">{{$pet->name}}</td>
                                @if ($pet->tipo == 1)
                                <td class="col-md-1">Gato</td>
                                @elseif($pet->tipo == 2)
                                <td class="col-md-1">Cachorro</td>
                                @else
                                <td class="col-md-1">N/A</td>
                                @endif
                                <td class="col-md-2">{{$pet->raca}}</td>
                                @foreach ($pessoas as $pessoa)
                                @if($pessoa->id == $pet->veterinario)
                                <td class="col-md-2">{{$pessoa->name}}</td>
                                <td class="col-md-2">{{$pessoa->name}}</td>
                                @endif
                                @endforeach
                                <td class="col-md-1 text-center">
                                <a class="btn btn-success btn-sm " href="#"><i class="fa fa-eye"></i></a>
                                </td>
                                <td class="col-md-2 text-center">
                                <a class="btn btn-success btn-sm " href="{{ url('/vacina/registro', $pet->id) }}"><i class="fa fa-plus"></i></a>
                                </td>
                             
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
