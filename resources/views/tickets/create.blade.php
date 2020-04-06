@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">{{ __('Criar Chamados') }}</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="label" class="col-md-2 col-form-label text-md-right">{{ __('Chamado') }}</label>
                    <div class="col-md-6">
                        <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" required autocomplete="label" autofocus placeholder="Chamado">
                        @error('label')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Descrição') }}</label>
                    <div class="col-md-6">
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus placeholder="Descreva o chamado"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="healt_insurance_id" class="col-md-2 col-form-label text-md-right">{{ __('Convênio') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="healt_insurance_id" id="healt_insurance_id" required>
                                <option value="">Selecione</option>
                                @foreach ($health as $item)
                                    <option value="{{ $item->id }}">{{ $item->cd_health_insurance }} - {{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type_id" class="col-md-2 col-form-label text-md-right">{{ __('Tipo') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="type_id" id="type_id" required>
                                <option value="">Selecione</option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="department_id" class="col-md-2 col-form-label text-md-right">{{ __('Departamento') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="department_id" id="department_id" required>
                                <option value="">Selecione</option>
                                @foreach ($departments as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_id" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" name="status_id" id="status_id" required>
                                <option value="">Selecione</option>
                                @foreach ($status as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file" class="col-md-2 col-form-label text-md-right">{{ __('Envie Arquivos') }}</label>
                    <div class="col-md-6">
                        <div class="input-group control-group increment" >
                            <input type="file" name="filename[]" class="form-control">
                            <div class="input-group-btn">
                              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i> Adicionar</button>
                            </div>
                          </div>
                          <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="file" name="filename[]" class="form-control">
                              <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Salvar') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>
