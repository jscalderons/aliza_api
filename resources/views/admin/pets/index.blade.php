@extends('layouts.admin')

@section('title', 'Mascotas')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">
        <i class="fas fa-paw"></i>
        Mascotas
    </li>
@endsection

@section('header-title')
    <i class="fas fa-paw"></i>
    Mascotas
@endsection

@section('actions-page')
    <a href="{{ route('pets.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <data-table>
            <template v-slot:thead>
                <tr>
                    <th>Acciones</th>
                    <th>index</th>
                    <th class="d-none">uid</th>
                    <th>Proceso</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </template>
            <template v-slot:tbody>
                @foreach ($pets as $index => $pet)
                    <tr>
                        <td>
                            <a href="{{ route('pets.edit', $pet) }}" class="btn btn-link"><i class="fas fa-pen"></i></a>
                            {{-- <a href="#" class="btn btn-link"><i class="fas fa-trash"></i></a> --}}
                        </td>
                        <td>{{$index + 1}}</td>
                        <td searchable class="d-none">{{ $pet->uid }}</td>
                        <td searchable>{{ $pet->process->name }}</td>
                        <td searchable>{{ $pet->user->name }}</td>
                        <td searchable>{{ $pet->name }}</td>
                        <td>{{ $pet->phone }}</td>
                    </tr>
                @endforeach
            </template>
        </data-table>
    </div>
</div>
@endsection
