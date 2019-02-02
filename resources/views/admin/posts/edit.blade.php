@extends('layouts.admin')

@section('title', 'Editar publicación')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <i class="far fa-newspaper"></i>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('posts.index') }}">Lista</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Editar publicación</li>
@endsection

@section('header-page')
    Editar publicación <small>{{$post->title}}</small>
@endsection

@section('actions-page')
    <button type="button" class="btn btn-warning" onclick="document.getElementById('form').submit();">
        <i class="fas fa-pen"></i>
        Actualizar
    </button>
@endsection

@section('content')
<form enctype="multipart/form-data" action="{{ route('posts.update', $post) }}" method="POST" id="form">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="form-group">
                        <label for="">Titulo</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') ?? $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="">Cuerpo</label>
                        <textarea-editor name="body" value="{{ old('body') ?? $post->body }}" ></textarea-editor>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input type="file" name="image" class="form-control-file" id="inputFile">
                        <div id="preview" class="mt-2">
                            <img src="/storage/images/posts/{{$post->uid}}/{{$post->image}}" alt="{{$post->image}}" class="img-fluid img-thumbnail w-100">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection

@section('scripts')
    <script>
        (function() {
            console.log('inicio.');
            const inputFile = document.querySelector('#inputFile');
            const preview = document.querySelector('#preview');

            inputFile.addEventListener('change', function(event) {
                const files = event.target.files || event.dataTransfer.files;
                const el = document.createElement('img');

                preview.innerHTML = "";

                el.src = URL.createObjectURL(files[0]);
                el.alt = files[0].filename;
                el.className = 'img-fluid img-thumbnail w-100';

                preview.appendChild(el);
            });
        })()
    </script>
@endsection
