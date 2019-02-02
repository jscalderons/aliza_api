@extends('layouts.admin')

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
                    <small>Entre: {{now()->startOfWeek()->format('Y-m-d')}} a {{now()->format('Y-m-d')}}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
