@extends('layouts.app')

@section('content')
<div class="container" id="home">
    <div class="row justify-content-center text-center">
        <h1>Conect Pet</h1>
        <p>Conectando Pets, Veterinarios e Pais: um registro seguro e um cartão de vacinação em um clique!</p>
    </div>
    @if($user->level == 2)
    <div class="row" id="mensagem_home">
        <h2>Bem Vindo Veterinario(a) {{$user->name}}</h2>
        <h3>Seu conhecimento e cuidado fazem a diferença na vida dos animais e de seus donos.</h3>
    </div>
    @else
    <div class="row" id="mensagem_home">
        <h2>Bem Vindo Amigo(a) dos Animais, {{$user->name}}</h2>
        <h3>Seu carinho e atenção são fundamentais para a qualidade de vida do seu animal. </h3>
        <h3>Esteja sempre atualizado(a) com os registros de vacinação e cuidados de saúde. </h3>
    </div>
    @endif
    <div id="rodape">
    <img src="{{ asset('bghome.png') }}" alt="Descrição da imagem">
    </div>

</div>
@endsection