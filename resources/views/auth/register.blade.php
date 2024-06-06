@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastre-se') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome<span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">E-mail<span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="level" class="col-md-4 col-form-label text-md-end">Tipo de acesso<span style="color: red;">*</span></label>
                            <div class="col-md-6">
                                <select name="level" id="level" class="form-control" required>
                                    <option value="" selected>Selecione o tipo de acesso...</option>
                                    <option value="1">Proprietário de pet</option>
                                    <option value="2">Veterinário</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3" id="crmv-field">
                            <label for="crmv" class="col-md-4 col-form-label text-md-end">CRMV<span style="color: red;">*</span></label></label>
                            <div class="col-md-6">
                                <input id="crmv" type="text" class="form-control" name="crmv" placeholder="Preencha somente se for veterinário">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Senha<span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirme sua senha<span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="col-md-4">
                            </div>
                            <label for="" class="col-md-8 col-form-label text-md-right"><span style="color: red;">*Campos obrigatórios</span></label>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success w-100">
                                    Cadastrar
                                </button>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const levelSelect = document.getElementById('level');
        const crmvInput = document.getElementById('crmv');
        const crmvField = document.getElementById('crmv-field');

        function toggleCrmvRequirement() {
            if (levelSelect.value == '2') {
                crmvInput.setAttribute('required', 'required');
                crmvField.style.display = 'flex';
            } else {
                crmvInput.removeAttribute('required');
                crmvField.style.display = 'none';
            }
        }

        // Initial check in case the select box is already set to Veterinário
        toggleCrmvRequirement();

        // Add event listener to check changes in the select box
        levelSelect.addEventListener('change', toggleCrmvRequirement);
    });
</script>
@endsection