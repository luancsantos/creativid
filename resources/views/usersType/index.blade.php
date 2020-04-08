@extends('layouts.app')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
    <h3 class="page-title">
        <i class="fa fa-newspaper-o"></i> Tipos de Usuários
        <div class="pull-right">
            <a href="{{ route('users-type.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Cadastrar
            </a>
        </div>
    </h3>
<div class="row">
<!-- TABLE NO PADDING -->
<div class="panel">
<div class="panel-body no-padding">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userType as $item)
            <tr>
                <td>{{ $item->label }}</td>
                <td>
                    <form method="post" action="{{route('users-type.destroy', $item->id)}}" id="{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('users-type.edit', $item->id) }}"
                                class="btn btn-primary"
                                title="Editar">
                            <i class="lnr lnr-pencil"></i>
                        </a>
                        <a href="{{ route('users-type.destroy', $item->id) }}"
                                class="btn btn-danger"
                                title="Excluir">
                            <i class="lnr lnr-trash"></i>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
