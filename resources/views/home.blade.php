@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body" id="julia"> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Todos os usuarios
                        @foreach($pessoas as $usuario)
                        <h1>NOME: {{$usuario->name}} EMAIL: {{$usuario->email}} senha: {{$usuario->password}}</h1>
                        @endforeach
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
