@extends('layouts.admin')

@section('title', 'Publicaciones')


@section('breadcrumb')
    <li class="breadcrumb-item">
        <i class="far fa-newspaper"></i>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Lista</li>
@endsection

@section('header-page')
    Lista
@endsection

@section('actions-page')
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>uid</th>
                            <th>Titulo</th>
                            <th>Usuario</th>
                            {{-- <th>Cuerpo</th> --}}
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('posts.edit', $post->uid) }}" class="btn btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                                <td>{{ $post->uid }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                {{-- <td>{{ $post->body }}</td> --}}
                                <td>{{ $post->image }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
