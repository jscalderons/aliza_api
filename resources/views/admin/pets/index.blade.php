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

{{-- @section('actions-page')
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Agregar
    </a>
@endsection --}}

@section('content')
<pet-card-container></pet-card-container>
@endsection
