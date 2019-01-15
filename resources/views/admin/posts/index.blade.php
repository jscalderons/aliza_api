@extends('layouts.admin')

@section('title', 'Publicaciones')

@section('content')
    <div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">crear</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>uid</th>
                    <th>Titulo</th>
                    <th>Usuario</th>
                    <th>Cuerpo</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <a href="{{ route('posts.edit', $post->uid) }}" class="btn btn-warning">editar</a>
                        </td>
                        <td>{{ $post->uid }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->image }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
