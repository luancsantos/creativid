@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ __('Criar Convênio') }}</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('health-insurance.store') }}">
                @csrf
                <div class="form-group row">
                    <label for="cd_health_insurance" class="col-md-2 col-form-label text-md-right">{{ __('Código Convênio') }}</label>
                    <div class="col-md-6">
                        <input id="cd_health_insurance" type="text" class="form-control @error('cd_health_insurance') is-invalid @enderror" name="cd_health_insurance" required autocomplete="cd_health_insurance" autofocus placeholder="Código Convênio">
                        @error('cd_health_insurance')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
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

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Salvar') }}
                        </button>
                        <a href="/health-insurance" class="btn btn-primary">
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
@endsection
