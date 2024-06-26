@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8"></div>
        @if(Auth::user()->level == 2)
        <div class="col-md-4">
            <a class="btn btn-success w-100" href="{{ url('/cadastro_vacina') }}" role="button">Cadastrar Vacina</a>
        </div>
        @endif
        <div class="col-md-5"></div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-xl-auto" id="tabelapets">
            <div class="card">
                <div class="card-header">{{ __('Vacinas') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table text-center" id="tabela">
                        <thead>
                            <tr>
                                <th class="col-md-3 text-center">Nome</th>
                                <th class="col-md-3 text-center">Dose</th>
                                <th class="col-md-3 text-center">Lote</th>
                                <th class="col-md-3 text-center">Data de Validade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vacinas as $vacina)
                            <tr>
                                <td class="col-md-3 text-center">{{$vacina->name}}</td>
                                <td class="col-md-3 text-center">{{$vacina->dose}}</td>
                                <td class="col-md-3 text-center">{{$vacina->lote}}</td>
                                <td class="col-md-3 text-center">{{ date('d/m/Y', strtotime($vacina->dataValidade))}}</td>
                            </tr>
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