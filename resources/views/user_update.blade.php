@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Usuário') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update',$user) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                          <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Acesso') }}</label>
                          <div class="col-md-6">
                              <select class="form-control" name="level" id="level">
                                    @if($user->level == 1)
                                    <option value="1" selected>Proprietário de pet</option>
                                    <option value="2" >Veterinário</option>
                                    @else
                                    <option value="2" selected>Veterinário</option>
                                    <option value="1" >Proprietário de pet</option>
                                    @endif
                              </select>
                          </div>
                        </div>
                       <br>
                       <div class="form-group row" id="crmv-field">
                           <label for="crmv" class="col-md-4 col-form-label">CRMV<span style="color: red;">*</span></label></label>
                            <div class="col-md-6">
                                <input id="crmv" type="text" class="form-control" name="crmv" placeholder="Preencha somente se for veterinário">                           
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <input type="submit" onclick="this.disabled = true; this.value = 'Enviando…'; this.form.submit();" name="btnSalvar" class="btn btn-secondary btn-success btn-block shadow-sm" value="Salvar">
                            </div>
                        </div>                       
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
