@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"> {{ __('Criar Tipo de Usuário') }}</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('users-type.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="label" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                    <div class="col-md-6">
                        <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" required autocomplete="label" autofocus placeholder="Nome">
                        @error('label')
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
                        <a href="/users-type" class="btn btn-primary">
                            {{ __('Voltar') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
