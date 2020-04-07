@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-body">
                <div class="form-group row">
                    <label for="label" class="col-md-2 col-form-label text-md-right">{{ __('Chamado') }}</label>
                    <div class="col-md-6">
                        <input id="label" type="text" value='{{ $ticket->label }}' class="form-control"  readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type_id" class="col-md-2 col-form-label text-md-right">{{ __('Tipo') }}</label>
                    <div class="col-md-6">
                        <input id="label" type="text" value='{{ $types->name }}' class="form-control"  readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="department_id" class="col-md-2 col-form-label text-md-right">{{ __('Departamento') }}</label>
                    <div class="col-md-6">
                        <input id="label" type="text" value='{{ $departments->name }}' class="form-control"  readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status_id" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                    <div class="col-md-6">
                        <input id="label" type="text" value='{{ $status->name }}' class="form-control"  readonly/>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="file" class="col-md-2 col-form-label text-md-right">{{ __('Arquivos') }}</label>
                    <div class="col-md-6">
                        @foreach ($images as $image)
                            <img src='{{ asset('/images/'.$ticket->id.'/' .$image) }}' style='width:100px;height:100px;'/>
                        @endforeach
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Descrição') }}</label>
                    <div class="col-md-6">
                        <textarea id="description" style="height: 232px;" type="text" class="form-control" readonly>{{ $ticket->description }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Comentários') }}</label>
                    <div class="col-md-8" id="tab-bottom-left1">
                        <ul class="list-unstyled activity-timeline">
                            @foreach ($comments as $item)
                                <li>
                                    <i class="fa fa-comment activity-icon"></i>
                                    <p>{{ $item->description }} <span class="timestamp">Comentado por:
                                        @foreach($users as $user)
                                            {{ $item->user_id == $user->id ? $user->name : '' }}
                                        @endforeach
                                        - {{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</span></p>
                                </li>
                            @endforeach
                        </ul>
                        <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data" class="form">
                            <input type="hidden" id="ticket_id" name="ticket_id" value="{{ $ticket->id }}"/>
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}"/>
                            @csrf

                            <textarea id='message' name="message" style='height: 232px;width: 814px;margin-bottom:10px;' type='text' class='form-control'></textarea>
                            <button type='submit' id='send' class='btn btn-success'>Enviar</button>
                            <button type='button' id='cancel' class='btn btn-danger'>Cancelar</button>
                        </form>
                        <div class="col-md-6 offset-md-4">
                            <button type="button" id='reply' class="btn btn-success">Responder</button>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <a href="/tickets" class="btn btn-primary">
                            {{ __('Voltar') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var divPai = $('.form');
        var btnCriar = $('#reply');

        divPai.hide();

        btnCriar.click(function(){
            var btnCancel = $('#cancel');
            var btnSend = $('#send');
            var btnMsg = $('#message');

            divPai.show();
            btnCriar.hide();

            btnCancel.click(function(){
                btnCriar.show();
                btnCancel.hide();
                btnMsg.hide();
                btnSend.hide();
            });
        });




    });
</script>
