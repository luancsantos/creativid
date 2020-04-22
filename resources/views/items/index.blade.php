@extends('layouts.app')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">
            <i class="lnr lnr-upload"></i> Importação de items TISS
        </h3>
    <div class="row">
    <div class="panel">
    <div class="panel-body no-padding">
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" class="form-control">
            <br>
            <button class="btn btn-success">Importar Items</button>
        </form>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
