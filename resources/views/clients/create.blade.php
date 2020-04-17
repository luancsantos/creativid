@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ __('Criar Clientes') }}</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('clients.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus placeholder="Nome">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-mail') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus placeholder="E-mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cnpj" class="col-md-2 col-form-label text-md-right">{{ __('Cpf | Cnpj') }}</label>
                    <div class="col-md-6">
                        <input id="cnpj" type="number" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" required autocomplete="cnpj" autofocus placeholder="Cpf | Cnpj">
                        @error('cnpj')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-type-id" class="col-md-2 col-form-label text-md-right">{{ __('Rua') }}</label>
                    <div class="col-md-6">
                        <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" required autocomplete="street" autofocus placeholder="Rua">
                        @error('street')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-type-id" class="col-md-2 col-form-label text-md-right">{{ __('Cidade') }}</label>
                    <div class="col-md-6">
                        <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" name="city" required autocomplete="city" autofocus placeholder="Cidade">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-type-id" class="col-md-2 col-form-label text-md-right">{{ __('Estado') }}</label>
                    <div class="col-md-6">
                        <input id="state" type="state" class="form-control @error('state') is-invalid @enderror" name="state" required autocomplete="state" autofocus placeholder="Estado">
                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Salvar') }}
                        </button>
                        <a href="/clients" class="btn btn-primary">
                            {{ __('Voltar') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
