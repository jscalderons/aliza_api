@extends('layouts.admin')

@section('title', 'Publicaciones')

@section('content')
    <div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">crear</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>uid</th>
                <th>Titulo</th>
                <th>Usuario</th>
                <th>Cuerpo</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->uid }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->image }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->uid) }}" class="btn btn-warning">editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
