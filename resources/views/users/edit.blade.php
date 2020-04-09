@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ __('Editar Usuário') }}</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}" id="{{ $user->id }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>
                    <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value='{{ $user->name }}' name="name" required autocomplete="name" autofocus placeholder="Nome">
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
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" value='{{ $user->email }}' name="email" required autocomplete="email" autofocus placeholder="E-mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Senha') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value='{{ $user->password }}' name="password" required autocomplete="password" autofocus placeholder="Senha">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="client_id" class="col-md-2 col-form-label text-md-right">{{ __('Empresa') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="client_id" id="client_id" required>
                                <option value="">Selecione</option>
                                @foreach ($clients as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $user->client_id ? 'Selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type_user_id" class="col-md-2 col-form-label text-md-right">{{ __('Tipo de Usuário') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="type_user_id" id="type_user_id" required>
                                <option value="">Selecione</option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $user->type_user_id ? 'Selected' : ''}}>{{ $item->label }}</option>
                                @endforeach
                        </select>
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
                        <a href="/users" class="btn btn-primary">
                            {{ __('Voltar') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
