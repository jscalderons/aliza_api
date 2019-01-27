@extends('layouts.admin')

@section('title', 'Tiendas locales')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <form enctype="multipart/form-data" action="{{ route('sites.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Categoría</label>
                    <div class="col">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="0">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" class="form-control" name="category_id" value="{{ old('category_id') }}"> --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Nombre</label>
                    <div class="col">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Descripción</label>
                    <div class="col">
                        <textarea name="description" class="form-control" value="{{ old('description') }}"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Teléfono</label>
                    <div class="col">
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Ciudad - Departamento</label>
                    <div class="col">
                        <input type="text" class="form-control" name="location" value="{{ old('location') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Dirección</label>
                    <div class="col">
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Latitud</label>
                    <div class="col">
                        <input type="text" class="form-control" name="latitude" value="{{ old('latitude') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Longitud</label>
                    <div class="col">
                        <input type="text" class="form-control" name="longitude" value="{{ old('longitude') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-lg-1 col-form-label">Imagen</label>
                    <div class="col">
                        <input type="file" name="image"  value="{{ old('image') }}">
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
