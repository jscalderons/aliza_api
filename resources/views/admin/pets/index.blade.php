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
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Proceso</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pets as $pet)
                            <tr>
                                <td>
                                    <a href="#" class="btn btn-link disabled">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </td>
                                <td>{{ $pet->process->name }}</td>
                                <td>{{ $pet->user->name }}</td>
                                <td>{{ $pet->name }}</td>
                                <td>{{ $pet->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pets->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
