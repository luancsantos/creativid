@extends('layouts.app')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                @csrf
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
                            <li>
                                <i class="fa fa-comment activity-icon"></i>
                                <p>Commented on post <a href="#">Prototyping</a> <span class="timestamp">2 minutes ago</span></p>
                            </li>
                            <li>
                                <i class="fa fa-comment activity-icon"></i>
                                <p>Uploaded new file <a href="#">Proposal.docx</a> to project <a href="#">New Year Campaign</a> <span class="timestamp">7 hours ago</span></p>
                            </li>
                            <li>
                                <i class="fa fa-comment activity-icon"></i>
                                <p>Added <a href="#">Martin</a> and <a href="#">3 others colleagues</a> to project repository <span class="timestamp">Yesterday</span></p>
                            </li>
                            <li>
                                <i class="fa fa-comment activity-icon"></i>
                                <p>Finished 80% of all <a href="#">assigned tasks</a> <span class="timestamp">1 day ago</span></p>
                            </li>
                        </ul>
                        <div class="col-md-6 offset-md-4">
                            <button type="button" class="btn btn-success">Responder</button>
                        </div>
                    </div>
                </div>
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
