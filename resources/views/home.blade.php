@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($pets as $pet)
    <div class="row bg-white shadow-sm py-3">
        <div class="col-md-2">
            <div class="text-center">
                Total: {{ $pet->images->count() }}
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($pet->images as $index => $image)
                        @if (!$index)
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ url("/storage/images/pets/{$pet->uid}/{$image->filename}") }}" alt="First slide">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url("/storage/images/pets/{$pet->uid}/{$image->filename}") }}" alt="First slide">
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="col-md-10">
            <h1 class="display-4">{{ $pet->name }}</h1>
            <p class="lead">{{ $pet->description }}</p>
            <hr class="my-4">
            <div class="text-right">
                <form action="{{ route('pet.approve', $pet->uid) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Aprobar
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
