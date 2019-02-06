@extends('layouts.admin')

@section('title', 'Publicaciones')


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">
        <i class="far fa-newspaper"></i>
        Publicaciones
    </li>
@endsection

@section('header-title')
    <i class="far fa-newspaper"></i>
    Publicaciones
@endsection

@section('actions-page')
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus-square"></i>
        Nuevo
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
                                    <a href="{{ route('posts.edit', $post->uid) }}" class="btn btn-link">
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
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
