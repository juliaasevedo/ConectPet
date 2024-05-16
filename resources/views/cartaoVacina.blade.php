@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cartão de vacina de {{$pet[0]->name}}</div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @foreach($pet as $pet)
                        <div class="row form-group">
                            <label for="name" class="col-md-1 col-form-label text-md-right">Nome:</label>
                            <div class="col-md-2">
                                <input type="text" id="name" class="form-control" name="name" required value="{{$pet->name}}">
                            </div>
                            <label for="tipo" class="col-md-1 col-form-label text-md-right">Tipo:</label>
                            <div class="col-md-2">
                                @if($pet->tipo == 1)
                                <input type="text" id="tipo" class="form-control" name="tipo" required value="Gato">
                                @else
                                <input type="text" id="tipo" class="form-control" name="tipo" required value="Cachorro">
                                @endif
                            </div>
                            <label for="raca" class="col-md-1 col-form-label text-md-right">Raça:</label>
                            <div class="col-md-2">
                                <input type="text" id="raca" class="form-control" name="raca" required value="{{$pet->raca}}">
                            </div>
                            <label for="proprietario" class="col-md-1 col-form-label text-md-right">Proprietário:</label>
                            <div class="col-md-2">
                                <input type="text" id="proprietario" class="form-control" name="proprietario" required value="{{$proprietarios[0]->name}}">
                            </div>
                        </div>
                        @endforeach
                        <br>
                        <h1 class="text-center">VACINAS:</h1>
                        @foreach($veterinarios as $veterinario)
                        @foreach($vacinasAplicadas->where('veterinario', $veterinario->id) as $vacinaAplicada)


                        <div class="row form-group">
                            <label for="vacina" class="col-md-2 col-form-label text-md-right">Vacina:</label>
                            <div class="col-md-2">
                                @foreach($vacinas as $vacina)    
                                @if($vacinaAplicada->vacina == $vacina->id)
                                <input type="text" id="vacina" class="form-control" name="vacina" required value="{{$vacina->name}}">
                            @endif  
                            @endforeach  
                            </div>
                            <label for="dose" class="col-md-2 col-form-label text-md-right">Dose:</label>
                            <div class="col-md-2">
                                @foreach($vacinas as $vacina)    
                                @if($vacinaAplicada->vacina == $vacina->id)
                                <input type="text" id="dose" class="form-control" name="dose" required value="{{$vacina->dose}}">
                            @endif  
                            @endforeach 
                            </div>
                            <label for="lote" class="col-md-2 col-form-label text-md-right">Lote::</label>
                            <div class="col-md-2">
                            @foreach($vacinas as $vacina)    
                            @if($vacinaAplicada->vacina == $vacina->id)
                                <input type="text" id="lote" class="form-control" name="lote" required value="{{$vacina->lote}}">
                            @endif  
                            @endforeach 
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <label for="veterinario" class="col-md-2 col-form-label text-md-right">Veterinário:</label>
                            <div class="col-md-1">
                                <input type="text" id="veterinário" class="form-control" name="veterinário" required value="{{$veterinario->name}}">
                            </div>
                            <label for="crmv" class="col-md-2 col-form-label text-md-right">CRMV::</label>
                            <div class="col-md-1">
                                <input type="text" id="crmv" class="form-control" name="crmv" required value="{{$veterinario->crmv}}">
                            </div>
                            <label for="dataAplicacao" class="col-md-2 col-form-label text-md-right">Data de Aplicação:</label>
                            <div class="col-md-1">
                                <input type="text" id="dataAplicacao" class="form-control" name="dataAplicacao" required value="{{$vacinaAplicada->created_at->format('d/m/Y')}}">
                            </div>
                            <label for="proxAplicacao" class="col-md-2 col-form-label text-md-right">Próxima Aplicação:</label>
                            <div class="col-md-1">
                                <input type="text" id="proxAplicacao" class="form-control" name="proxAplicacao" required value="{{ date('d/m/Y', strtotime($vacinaAplicada->proxAplicacao)) }}">
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                        <br>
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