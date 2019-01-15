@extends('layouts.admin')

@section('title', 'Mascotas')

@section('content')
<div class="card-columns">
    @foreach ($pets as $pet)
    <div class="card">
        <div class="card-header">
            @if ($pet->gender == 'F')
                <i class="fas fa-venus" style="color: #ff80ab"></i>
            @else
                <i class="fas fa-mars" style="color: #8c9eff"></i>
            @endif
            {{ $pet->name }}
        </div>
        @if ($pet->images)
            <div style="background-image: url({{ url("/storage/images/pets/{$pet->uid}/{$pet->images[0]->filename}") }});
                        background-position: center center;
                        background-size: cover;
                        height: 200px;"
                class="card-img-top">
            </div>
        @endif
        <div class="card-body">
            <p class="card-text">
                {!! str_limit($pet->description, 120) !!}
            </p>
        </div>
        <div class="card-footer d-flex justify-content-around">
            <form action="{{ route('pet.approve', $pet->uid) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link">Aceptar</button>
            </form>
            <form action="{{ route('pet.reject', $pet->uid) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Rechazar</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
