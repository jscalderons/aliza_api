@extends('layouts.admin')

@section('title', 'Editar local')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('sites.index') }}">
            <i class="fas fa-store"></i>
            locales
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <i class="far fa-edit"></i>
        {{ $site->name }}
    </li>
@endsection

@section('header-title')
    <i class="far fa-edit"></i>
    Editar local:
@endsection

@section('header-subtitle', $site->name)

@section('actions-page')
    <button type="button" class="btn btn-warning" onclick="document.getElementById('form').submit();">
        <i class="fas fa-pen"></i>
        Actualizar
    </button>
@endsection

@section('content')
<form enctype="multipart/form-data" action="{{ route('sites.update', $site) }}" method="POST" id="form">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="form-group">
                        <label for="">Categoría</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$site->category_id == $category->id ? 'selected' : '' }}>
                                    {{$category->name}}
                                </option>
                            @endforeach
                            </select>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') ?? $site->name }}">
                    </div>

                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') ?? $site->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="description" class="form-control">{{ old('description') ?? $site->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Ciudad - Departamento</label>
                                <input type="text" class="form-control" name="location" value="{{ old('location') ?? $site->location }}">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') ?? $site->address }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Latitud</label>
                                <input type="text" class="form-control" name="latitude" value="{{ old('latitude') ?? $site->latitude }}">
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="">Longitud</label>
                                <input type="text" class="form-control" name="longitude" value="{{ old('longitude') ?? $site->longitude }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <input-file name="image" :default-files="{
                            base: '/storage/images/sites/{{$site->uid}}',
                            files: [{
                                filename: '{{$site->image}}'
                            }]
                        }" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
