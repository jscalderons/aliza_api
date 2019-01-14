@extends('layouts.admin')

@section('content')
    <div class="row">
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
    </div>
@endsection
