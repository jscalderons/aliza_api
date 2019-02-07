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
    <a href="#" class="btn btn-primary disabled">
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
                    <th class="d-none">uid</th>
                    <th>Proceso</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                </tr>
            </template>
            <template v-slot:tbody>
                @foreach ($pets as $pet)
                    <tr>
                        <td>
                            <a href="#" class="btn btn-link disabled">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
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
