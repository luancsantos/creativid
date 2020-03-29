@extends('layouts.app')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
    <h3 class="page-title">
        <i class="fa fa-newspaper-o"></i> Chamados em Aberto
    </h3>
<div class="row">
<!-- TABLE NO PADDING -->
<div class="panel">
<div class="panel-body no-padding">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Tipo de Chamado</th>
                <th>Departamento</th>
                <th>Status</th>
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
                    @foreach ($departments as $department)
                        {{ $item->department_id == $department->id ? $department->name : '' }}
                    @endforeach
                </td>
                <td>
                    @if ($item->status_id == 1)
                        <span class="btn btn-danger">
                    @else
                        <span class="btn btn-warning">
                    @endif

                    @foreach ($status as $value)
                        {{ $item->status_id == $value->id ? $value->name : '' }}
                    @endforeach
                </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection