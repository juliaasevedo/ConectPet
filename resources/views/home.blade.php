@extends('layouts.app')

@section('content')
<div class="container" id="home">
    <div class="row justify-content-center text-center">
        <h1>Conect Pet</h1>
        <p>Conectando veterinários, pets e pais: um registro seguro e um cartão de vacinação em um clique!</p>
    </div>
    @if($user->level == 2)
    <div class="row" id="mensagem_home">
        <h2>Bem-vindo, Sr(a)  {{$user->name}}.</h2>
        <br>
        <h3>Seu conhecimento e cuidado fazem a diferença na vida dos animais e de seus donos.</h3>
    </div>
    @else
    <div class="row" id="mensagem_home">
        <h2>Bem-vindo, Sr(a) {{$user->name}}.</h2>
        <br>
        <h3>Seu carinho e atenção são fundamentais para a qualidade de vida do seu animal. </h3>
        <h3>Esteja sempre atualizado(a) com os registros de vacinação e cuidados de saúde. </h3>
    </div>
    @endif
    <div id="rodape">
    <img src="{{ asset('bghome.png') }}" alt="Descrição da imagem">
    </div>

</div>
@endsection