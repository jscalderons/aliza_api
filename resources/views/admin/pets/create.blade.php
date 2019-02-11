@extends('layouts.admin')

@section('title', 'Nueva Mascota')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('pets.index') }}">
            <i class="fas fa-paw"></i>
            Mascotas
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <i class="far fa-plus-square"></i>
        Nueva Mascota
    </li>
@endsection

@section('header-title')
    <i class="far fa-plus-square"></i>
    Nueva Mascota
@endsection

@section('actions-page')
    <button type="button" class="btn btn-success" onclick="document.getElementById('form').submit();">
        <i class="fas fa-save"></i>
        Guardar
    </button>
@endsection

@section('content')
<form enctype="multipart/form-data" action="{{ route('pets.store') }}" method="POST" id="form">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-8 col-sm-12">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Proceso</label>
                        <select name="process_id" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($processes as $process)
                                <option value="{{$process->id}}" {{ old('process_id') == $process->id ? 'selected' : '' }}>
                                    {{$process->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Género</label>
                        <select name="gender" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            <option value="H" {{ old('gender') == 'H' ? 'selected' : '' }}>Hombre</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Mujer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Edad</label>
                        <input type="number" name="age" min="0" class="form-control" value="{{ old('age') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-12">

                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Locación</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Latitud</label>
                                <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Longitud</label>
                                <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="sterilized" {{ old('sterilized') ? 'checked' : '' }}>
                        <label for="">¿Esterilizado?</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="vaccinated" {{ old('vaccinated') ? 'checked' : '' }}>
                        <label for="">¿Vacunado?</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="approve" {{ old('approve') ? 'checked' : '' }}>
                        <label for="">Aprobar</label>
                    </div>


                </div>

                <div class="w-100"></div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Imagenes</label>
                        <input-file name="images[]" :multiple="true"></input-file>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection
