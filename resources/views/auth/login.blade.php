<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="fundo">
    <div class="container" id="login">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="cardLogin">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"> Email<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Senha<span style="color: red;">*</span></label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                </div>
                                <label for="" class="col-md-8 col-form-label text-md-right"><span style="color: red;">*Campos obrigatórios</span></label>
                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="col-md-4">
                                <a href="{{ url('/register') }}" class="btn btn-success btn-primary w-100 ">
                                        {{ __('Cadastrar Usuário') }}
                                    </a>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </form>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="py-4">
        <script>
            var mensagemErro = "{{ session('mensagem-erro') }}";
            var mensagemAlerta = "{{ session('mensagem-alerta') }}";
            var mensagemSucesso = "{{ session('mensagem-sucesso') }}";
        </script>
        <script src="{{ asset('/js/all.js')}}"></script>

    </main>
</body>

</html>