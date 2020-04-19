@extends('layouts.app')
@section('content')
<style>
    *[data-href] {
    cursor: pointer;
    }
    td a {
    display:inline-block;
    min-height:100%;
    width:100%;
    padding: 10px; /* add your padding here */
    }
    td {
    padding:0;
    }
</style>
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
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Chamado</th>
                <th>Usuário</th>
                <th>Data Abertura de Chamado</th>
                <th>Convenio</th>
                <th>{{ Auth::user()->type_user_id == 1 ? 'Cliente' : 'Departamento'}}</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $item)
            <tr data-href="{{ request()->getSchemeAndHttpHost().'/tickets/'. $item->id . '/show' }}">
                <td>{{ $item->id }}</td>
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
                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:m:s')}}
                </td>

                <td>
                    @foreach ($health as $value)
                        {{ $item->user_id == $value->id ? $value->name : '' }}
                    @endforeach
                </td>


                <td>
                    @if(Auth::user()->type_user_id == 1)
                        @foreach ($clients as $client)
                            {{ $item->client_id == $client->id ? $client->name : '' }}
                        @endforeach
                    @else
                        @foreach ($departments as $department)
                            {{ $item->department_id == $department->id ? $department->name : '' }}
                        @endforeach
                    @endif
                </td>
                <td>
                    @if ($item->status_id == 1)
                        <span class="btn btn-primary">
                    @elseif ($item->status_id == 5)
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $('*[data-href]').on("click",function(){
        window.location = $(this).data('href');
        return false;
    });
    $("td > a").on("click",function(e){
      e.stopPropagation();
    });
</script>
@endsection
