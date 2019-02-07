@extends('layouts.admin')

@section('title', 'Locales')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">
        <i class="fas fa-store"></i>
        Locales
    </li>
@endsection

@section('header-title')
    <i class="fas fa-store"></i>
    Locales
@endsection

@section('actions-page')
    <a href="{{ route('sites.create') }}" class="btn btn-primary">
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
                    <th scope="col">Acciones</th>
                    <th scope="col" class="d-none">uid</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Nombre</th>
                    {{-- <th scope="col">Imagen</th> --}}
                    <th scope="col">Descripción</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Longitud</th>
                </tr>
            </template>
            <template v-slot:tbody>
                @foreach ($sites as $site)
                    <tr>
                        <td>
                            <a href="{{ route('sites.edit', $site->uid) }}" class="btn btn-link">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                        <td searchable class="d-none">{{ $site->uid }}</td>
                        <td searchable>{{ $site->user->name }}</td>
                        <td searchable>{{ $site->category->name }}</td>
                        <td searchable>{{ $site->name }}</td>
                        {{-- <td>
                            @if ($site->image)
                                <img width="100px" src="{{ url("/storage/images/sites/{$site->uid}/{$site->image}") }}" alt="">
                            @endif
                        </td> --}}
                        <td searchable>{{ $site->description }}</td>
                        <td>{{ $site->phone }}</td>
                        <td>{{ $site->location }}</td>
                        <td searchable>{{ $site->address }}</td>
                        <td>{{ $site->latitude }}</td>
                        <td>{{ $site->longitude }}</td>
                    </tr>
                @endforeach
            </template>
        </data-table>
    </div>
</div>
@endsection
