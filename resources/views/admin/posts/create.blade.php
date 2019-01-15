@extends('layouts.admin')

@section('title', 'Publicaciones')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <form enctype="multipart/form-data" action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Titulo</label>
                    <div class="col">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Cuerpo</label>
                    <div class="col">
                        <textarea name="body" class="form-control" value="{{ old('body') }}"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Imagen</label>
                    <div class="col">
                        <input type="file" name="image"  value="{{ old('image') }}">
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
