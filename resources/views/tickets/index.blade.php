@extends('layouts.app')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
<div class="container-fluid">
    <h3 class="page-title">
    <i class="fa fa-newspaper-o"></i> {{ Auth::user()->type_user_id == 1 ? 'Todos' : 'Seus'}} Chamados
        <div class="pull-right">
            @if (Auth::user()->type_user_id == 1)
            <a href="#" id="mostrar">
                <button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> Filtros
                </button>
            </a>
            @endif
            <a href="{{ route('tickets.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Cadastrar
            </a>
        </div>
    </h3>
<div class="row">
<div id="capaefectos" style="display: none;">
    <div class="col-md-12" style="border: 1px solid #1abc9c; margin-bottom: 30px;">
        <div class="search-form" style="padding: 6px 22px;">
        <form class="form-horizontal new_merchant" id="charge_search" action="" accept-charset="UTF-8" method="get" novalidate="novalidate"><input name="utf8" type="hidden" value="✓">
            <div class="report-form">
                <div class="collapse search-form-content" id="filters" style="display: block;">
                <div class="row reports-filter">
                    <div class="col-md-4">
                        <div>
                            <label for="q_Método de pagamento">Cliente</label>
                            <div>
                                <select class="form-control">
                                    <option value="#">Selecione<option>
                                    @foreach ($clients as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}<option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="q_Status">Status</label>
                            <div>
                                <select class="form-control">
                                    <option value="#">Selecione<option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}<option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="q_Status">Departamento</label>
                            <div>
                                <select class="form-control">
                                    <option value="#">Selecione<option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}<option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="q_Data de pagamento">Data de Inicial</label>
                            <div>
                                <div class="submit-line">
                                    <input type="date" class="form-control" name="date_init" id="date_init" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <label for="q_Data de pagamento">Data de Final</label>
                            <div>
                                <div class="submit-line">
                                    <input type="date" class="form-control" name="date_final" id="date_final" />
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
          <div class="row reports-filter" style="margin-top: 10px;">
            <div class="col-md-12">
                <div class="pull-left">
                    <a href="#" id="ocultar">
                        <button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> Ocultar a filtro</button>
                      </a>
                </div>
              <div class="pull-right form-actions">
                <input type="submit" name="commit" value="Aplicar filtros" class="btn btn-primary"/>
              </div>
                    </div>
                </div>
                </div>
            </div>
        </form>
        </div>
      </div>
</div>

<div class="panel">
<div class="panel-body no-padding">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Chamado</th>
                <th>Usuário</th>
                <th>Data Abertura de Chamado</th>
                <th>Convênio</th>
                <th>Departamento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $item)
            <tr>
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
                        {{ $item->health_insurance_id == $value->id ? $value->name : '' }}
                    @endforeach
                </td>
                <td>
                    @foreach ($departments as $department)
                        {{ $item->department_id == $department->id ? $department->name : '' }}
                    @endforeach
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
                        {{ $value->id == $item->status_id ? $value->name : '' }}
                    @endforeach
                </span>
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
    <?php echo $tickets->render(); ?>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
    @if(session('alert'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> {{ session('alert') }}
        </div>
    @endif
</div>
@endsection
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
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
