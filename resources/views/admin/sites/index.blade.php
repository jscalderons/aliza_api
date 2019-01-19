@extends('layouts.admin')

@section('title', 'Tiendas locales')

@section('content')
    <div>
        <a href="{{ route('sites.create') }}" class="btn btn-primary">Crear</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>uid</th>
                    <th>Usuario ID</th>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Teléfono</th>
                    <th>Ubicación</th>
                    <th>Dirección</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sites as $site)
                    <tr>
                        <td>
                            <a href="{{ route('sites.edit', $site->uid) }}" class="btn btn-warning">editar</a>
                        </td>
                        <td>{{ $site->uid }}</td>
                        <td>{{ $site->user_uid }}</td>
                        <td>{{ $site->category->name }}</td>
                        <td>{{ $site->name }}</td>
                        <td>
                            @if ($site->image)
                                <img width="100px" src="{{ url("/storage/images/sites/{$site->uid}/{$site->image}") }}" alt="">
                            @endif
                        </td>
                        <td>{{ $site->description }}</td>
                        <td>{{ $site->phone }}</td>
                        <td>{{ $site->location }}</td>
                        <td>{{ $site->address }}</td>
                        <td>{{ $site->latitude }}</td>
                        <td>{{ $site->longitude }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
