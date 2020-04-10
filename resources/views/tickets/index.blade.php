@extends('layouts.app')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
    <h3 class="page-title">
    <i class="fa fa-newspaper-o"></i> {{ Auth::user()->type_user_id == 1 ? 'Todos' : 'Seus'}} Chamados
        <div class="pull-right">
            <a href="#" id="mostrar">
                <button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> Filtros
                </button>
            </a>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Cadastrar
            </a>
        </div>
    </h3>
<div class="row">

<div id="capaefectos" style="border:1px solid #000000 ;display: none;">

    <p>
        <a href="#" id="ocultar">Ocultar a filtro</a>
    </p>
</div>

<div class="panel">
<div class="panel-body no-padding">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Tipo de Chamado</th>
                <th>Usuário</th>
                <th>Departamento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->label }}</td>
                <td>
                    @foreach ($types as $type)
                        {{ $item->type_id == $type->id ? $type->name : '' }}
                    @endforeach
                </td>
                <td>
                    @foreach ($users as $user)
                        {{ $item->user_id == $user->id ? $user->name : '' }}
                    @endforeach
                </td>
                <td>
                    @foreach ($departments as $department)
                        {{ $item->department_id == $department->id ? $department->name : '' }}
                    @endforeach
                </td>
                <td>
                    <form method="post" action="{{route('tickets.destroy', $item->id)}}" id="{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('tickets.show', $item->id) }}"
                                class="btn btn-primary"
                                title="Ver">
                            <i class="fa fa-eye"></i>
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
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
</div>
@endsection
<script language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#ocultar").click(function(event){
            event.preventDefault();
            $("#capaefectos").hide("slow");
        });

        $("#mostrar").click(function(event){
            event.preventDefault();
            $("#capaefectos").show("slow");
        });
    });
</script>
