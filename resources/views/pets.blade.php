@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-6"></div>
    @if(Auth::user()->level == 1)
    <div class="col-md-6">
       <a class="btn btn-primary" href="{{ url('/cadastro_pet') }}" role="button">Cadastrar Pet</a>
    </div>
    @endif
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-xl-auto" id="">
            <div class="card">
                <div class="card-header">{{ __('Meus Pets') }}</div>
                
                <div class="card-body"> 
                    <table class="table text-center" id="tabela">
                        <thead>
                            <tr>
                                <th class="col-md-1">Nome</th>
                                <th class="col-md-1">Tipo</th>
                                <th class="col-md-1">Raça:</th>
                                <th class="col-md-1">Veterinário</th>
                                <th class="col-md-1">Proprietário</th>
                                <th class="col-md-2">Cartão de vacinas</th>
                                @if(Auth::user()->level == 2)
                                <th class="col-md-5">Registrar Vacina</th>
                                @else
                                <th class="col-md-1">Editar</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pets as $pet)
                            @if(Auth::user()->id == $pet->proprietario || Auth::user()->id == $pet->veterinario)
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
                                @endif
                                @endforeach
                                @foreach ($pessoas as $pessoa)
                                @if($pessoa->id == $pet->proprietario)
                                <td class="col-md-2">{{$pessoa->name}}</td>
                                @endif
                                @endforeach
                                <td class="col-md-1 text-center">
                                <a class="btn btn-success btn-sm " href="{{ url('/cartao/vacina', $pet->id) }}"><i class="fa fa-eye"></i></a>
                                </td>
                                @if(Auth::user()->level == 2)
                                <td class="col-md-5 text-center">
                                <a class="btn btn-success btn-sm " href="{{ url('/vacina/registro', $pet->id) }}"><i class="fa fa-plus"></i></a>
                                </td>
                                @else
                                <td class="col-md-2 text-center">
                                <a class="btn btn-success btn-sm " href="{{ url('/edit/pet', $pet->id) }}"><i class="fa fa-pencil"></i></a>
                                </td>
                                @endif
                            </tr>
                            @endif
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
