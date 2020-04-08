@extends('layouts.app')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
    <h3 class="page-title">
        <i class="fa fa-newspaper-o"></i> Departamentos
        <div class="pull-right">
            <a href="{{ route('health-insurance.create') }}" class="btn btn-primary">
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
                <th>Código Convênio</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($health as $item)
            <tr>
                <td>{{ $item->cd_health_insurance }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    <form method="post" action="{{route('departments.destroy', $item->id)}}" id="{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('departments.edit', $item->id) }}"
                                class="btn btn-primary"
                                title="Editar">
                            <i class="lnr lnr-pencil"></i>
                        </a>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $item->id }}')" title="Excluir">
                            <i class="lnr lnr-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <?php echo $health->render(); ?>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
