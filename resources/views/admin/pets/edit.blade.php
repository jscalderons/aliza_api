@extends('layouts.admin')

@section('title', 'Editar Mascota')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('pets.index') }}">
            <i class="fas fa-paw"></i>
            Mascotas
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <i class="far fa-edit"></i>
        {{ $pet->name }}
    </li>
@endsection

@section('header-title')
    <i class="far fa-edit"></i>
    Editar Mascota:
@endsection

@section('header-subtitle', $pet->name)

@section('actions-page')
    <button type="button" class="btn btn-warning" onclick="document.getElementById('form').submit();">
        <i class="fas fa-pen"></i>
        Actualizar
    </button>
@endsection

@section('content')
<form enctype="multipart/form-data" action="{{ route('pets.update', $pet) }}" method="POST" id="form">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-8 col-sm-12">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" name="name" value="{{ old('name') ?? $pet->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Proceso</label>
                        <select name="process_id" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            @foreach ($processes as $process)
                                <option value="{{$process->id}}"
                                    {{ ((old('process_id') ?? $pet->process_id) == $process->id) ? 'selected' : '' }}>
                                    {{$process->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Género</label>
                        <select name="gender" class="form-control" required>
                            <option value="">Seleccionar...</option>
                            <option value="H" {{ ((old('gender') ?? $pet->gender) == 'H') ? 'selected' : '' }}>Hombre</option>
                            <option value="M" {{ ((old('gender') ?? $pet->gender) == 'M') ? 'selected' : '' }}>Mujer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Edad</label>
                        <input type="number" name="age" min="0" class="form-control" value="{{ old('age') ?? $pet->age }}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Descripción</label>
                        <textarea name="description" rows="5" class="form-control" required>{{ old('description') ?? $pet->description }}</textarea>
                    </div>

                </div>

                <div class="col-lg-4 col-sm-12">

                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="tel" name="phone" class="form-control" value="{{ old('phone') ?? $pet->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Locación</label>
                        <input type="text" name="location" class="form-control" value="{{ old('location') ?? $pet->location }}" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Latitud</label>
                                <input type="text" name="latitude" class="form-control" value="{{ old('latitude') ?? $pet->latitude }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Longitud</label>
                                <input type="text" name="longitude" class="form-control" value="{{ old('longitude') ?? $pet->longitude }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="sterilized" {{ (old('sterilized')  ?? $pet->sterilized) ? 'checked' : '' }}>
                        <label for="">¿Esterilizado?</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="vaccinated" {{ (old('vaccinated')  ?? $pet->vaccinated) ? 'checked' : '' }}>
                        <label for="">¿Vacunado?</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="approve" {{ (old('approve') ?? $pet->approved_at) ? 'checked' : '' }}>
                        <label for="">Aprobar</label>
                    </div>


                </div>

                <div class="w-100"></div>

                <div class="col">
                    <div class="form-group">
                        <label for="">Imagenes</label>
                        <input-file name="images[]" :multiple="true" :default-files="{
                            base: '/storage/images/pets/{{$pet->uid}}',
                            files: {{$pet->images}}
                        }"></input-file>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection
