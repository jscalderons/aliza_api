@extends('layouts.admin')

@section('title', 'Inicio')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">
        <i class="fas fa-chart-bar"></i>
        Resumen
    </li>
@endsection

@section('header-title')
    <i class="fas fa-chart-bar"></i>
    Resumen
@endsection

@section('content')
    <div class="row">
        {{-- pets --}}
        <div class="col-xl-3 col-md-4 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-paw fa-3x"></i>
                    </div>
                    <h2 class="card-title fa-3x">{{ $pets->count() }}</h2>
                    <h5 class="card-subtitle text-muted">Mascotas por aprobar</h5>
                </div>
            </div>
        </div>
        {{-- users --}}
        <div class="col-xl-3 col-md-4 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <h2 class="card-title fa-3x">{{ $users->count() }}</h2>
                    <h5 class="card-subtitle text-muted">Nuevos usuarios</h5>
                    {{-- <small>Entre:
                        <time class="font-italic">{{now()->startOfWeek()->format('Y-m-d')}}</time>
                        a
                        <time class="font-italic">{{now()->endOfWeek()->format('Y-m-d')}}</time></small> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <header class="page-header">
                <div class="page-header--headline">
                    <div class="page-header--title">
                        <i class="fas fa-paw"></i>
                        Nuevas mascotas
                    </div>
                </div>
            </header>
            <pet-card-container></pet-card-container>
        </div>
    </div>
@endsection
