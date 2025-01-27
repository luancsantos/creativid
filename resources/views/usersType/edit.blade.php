@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ __('Editar Tipo de Usuário') }} - {{ $type->label }}</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('users-type.update', $type->id) }}" id="{{ $type->id }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $type->label }}" name="name" required autocomplete="name" autofocus placeholder="Nome">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="department_id" class="col-md-2 col-form-label text-md-right">{{ __('Departamento') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="department_id" id="department_id" required>
                                <option value="">Selecione</option>
                                @foreach ($department as $item)
                                    <option value="{{ $item->id }}" {{ $type->department_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
