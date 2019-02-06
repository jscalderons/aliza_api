@extends('layouts.admin')

@section('title', 'Editar publicación')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('posts.index') }}">
            <i class="far fa-newspaper"></i>
            Publicaciones
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <i class="far fa-edit"></i>
        {{$post->title}}
    </li>
@endsection

@section('header-title')
    <i class="far fa-edit"></i>
    Editar Publicación:
@endsection

@section('header-subtitle')
    {{$post->title}}
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
                        <input-file name="image" :default-files="{
                            base: '/storage/images/posts/{{$post->uid}}',
                            files: [{
                                filename: '{{$post->image}}'
                            }]
                        }" />
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection
{{--
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
@endsection --}}
