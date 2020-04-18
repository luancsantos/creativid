@extends('layouts.app')

@section('content')
<div class="panel">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-key" aria-hidden="true"></i> {{ __('Alterar Senha') }}</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('users.password.update', Auth::user()->id) }}" id="{{ Auth::user()->id }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Sua nova senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a nova senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Alterar') }}
                                </button>
                                <a href="/home" class="btn btn-primary">
                                    {{ __('Voltar') }}
                                </a>
                            </div>
                        </div>
                    </form>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
