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

        <data-table>
            <template v-slot:thead>
                <tr>
                    <th>Acciones</th>
                    <th class="d-none">uid</th>
                    <th>Titulo</th>
                    <th>Usuario</th>
                    {{-- <th>Cuerpo</th> --}}
                    <th>Imagen</th>
                </tr>
            </template>
            <template v-slot:tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            <a href="{{ route('posts.edit', $post->uid) }}" class="btn btn-link">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                        <td searchable class="d-none">{{ $post->uid }}</td>
                        <td searchable>{{ $post->title }}</td>
                        <td searchable>{{ $post->user->name }}</td>
                        {{-- <td>{{ $post->body }}</td> --}}
                        <td>{{ $post->image }}</td>
                    </tr>
                @endforeach
            </template>
        </data-table>

    </div>
</div>
@endsection
