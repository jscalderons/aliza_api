@extends('layouts.admin')

@section('title', 'Nueva publicación')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('posts.index') }}">
            <i class="far fa-newspaper"></i>
            Publicaciones
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <i class="far fa-plus-square"></i>
        Nueva Publicación
    </li>
@endsection

@section('header-title')
    <i class="far fa-plus-square"></i>
    Nueva Publicación
@endsection

@section('actions-page')
    <button type="button" class="btn btn-success" onclick="document.getElementById('form').submit();">
        <i class="fas fa-save"></i>
        Guardar
    </button>
@endsection

@section('content')
<form enctype="multipart/form-data" action="{{ route('posts.store') }}" method="POST" id="form">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="form-group">
                        <label for="">Titulo</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Cuerpo</label>
                        <textarea-editor name="body" value="{{ old('body') }}" ></textarea-editor>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input-file name="image"></input-file>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
