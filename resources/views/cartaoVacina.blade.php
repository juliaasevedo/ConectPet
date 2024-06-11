@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-auto" id="tabelapets">
            <div class="card">
                <div class="card-header">Cartão de vacina de {{$pet[0]->name}}</div>
                <div class="card-body">
                        @foreach($pet as $pet)
                        <div class="row text-center "id="vacinaInfo">
                            <div class="col-md-2"></div>
                            <div class="col-md-2">
                                <h5>Nome:</h5>
                                <p>{{$pet->name}}</p>
                            </div>
                            <div class="col-md-2">
                                <h5>Tipo:</h5>
                                @if($pet->tipo == 1)
                                <p>Gato</p>
                                @else
                                <p>Cachorro</p>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <h5>Raça:</h5>
                                <p>{{$pet->raca}}</p>
                            </div>
            
                            <div class="col-md-2">
                                <h5>Proprietário:</h5>
                                <p>{{$proprietarios[0]->name}}</p>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        @endforeach
                        <br>
                        <div class="card">
                            <div class="card-header">Vacinas</div>
                            <div class="card-body">

                                <table class="table text-center" id="tabela">
                                    <thead>
                                        <tr>
                                            <th class="col-md-1 text-center">Nome</th>
                                            <th class="col-md-1 text-center">Dose</th>
                                            <th class="col-md-1 text-center">Lote</th>
                                            <th class="col-md-1 text-center">Veterinário</th>
                                            <th class="col-md-1 text-center">CRMV</th>
                                            <th class="col-md-4 text-center">Data de Aplicação</th>
                                            <th class="col-md-3 text-center">Próxima Aplicação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($veterinarios as $veterinario)
                                        @foreach($vacinasAplicadas->where('veterinario', $veterinario->id) as $vacinaAplicada)
                                        <tr>
                                            @foreach($vacinas as $vacina)
                                            @if($vacinaAplicada->vacina == $vacina->id)
                                            <td class="col-md-1">{{$vacina->name}}</td>
                                            @endif
                                            @endforeach

                                            @foreach($vacinas as $vacina)
                                            @if($vacinaAplicada->vacina == $vacina->id)
                                            <td class="col-md-1">{{$vacina->dose}}</td>
                                            @endif
                                            @endforeach

                                            @foreach($vacinas as $vacina)
                                            @if($vacinaAplicada->vacina == $vacina->id)
                                            <td class="col-md-1">{{$vacina->lote}}</td>
                                            @endif
                                            @endforeach

                                            <td class="col-md-1">{{$veterinario->name}}</td>
                                            <td class="col-md-1">{{$veterinario->crmv}}</td>
                                            <td class="col-md-4">{{$vacinaAplicada->created_at->format('d/m/Y')}}</td>
                                            <td class="col-md-3">{{ date('d/m/Y', strtotime($vacinaAplicada->proxAplicacao)) }}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Inicializar a tabela #tabela, independentemente
        if ($.fn.dataTable.isDataTable('#tabela')) {
            table = $('#tabela').DataTable();
        } else {
            // Se ainda não foi inicializada, configurar DataTable para #tabela
            table = $('#tabela').DataTable({
                "scrollX":true,
                "language": {
                    processing: "Processando...",
                    search: "Pesquisar&nbsp;:",
                    lengthMenu: "Mostrar _MENU_ itens",
                    info: "Exibindo _START_ a _END_ item em _TOTAL_ itens",
                    infoEmpty: "Exibindo item de 0 a 0 de 0 itens",
                    infoFiltered: "(filtrado por _MAX_ itens no total)",
                    infoPostFix: "",
                    loadingRecords: "Carregando...",
                    zeroRecords: "Nenhum item para exibir",
                    emptyTable: "Nenhum dado disponível na tabela",
                    paginate: {
                        first: "Primeiro",
                        previous: "Anterior",
                        next: "Próximo",
                        last: "Último"
                    },
                    aria: {
                        sortAscending: ": habilita a ordenação da coluna em ordem crescente",
                        sortDescending: ": habilita a ordenação da coluna em ordem decrescente"
                    }
                }
            });
        }

    });
</script>
@endsection