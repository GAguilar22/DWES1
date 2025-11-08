@extends('layouts.master')

@section('contenido')
<div class="container mt-5">
    <h2 class="mb-4 text-center">{{ __('Selecciona el cicle que vols estudiar') }}</h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($cicles as $cicle)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset($cicle->image) }}" alt="Imatge del cicle" class="card-img-top" style="height: 150px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $cicle->name }}</h5>
                        <p class="text-muted">{{ $cicle->code }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <form method="POST" action="{{ route('students.storeCicle') }}">
                            @csrf
                            <input type="hidden" name="cicle_id" value="{{ $cicle->id }}">
                            <button type="submit" class="btn btn-info">
                                {{ __('Registrar-se') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @error('cicle_id')
        <div class="text-danger mt-3 text-center">{{ $message }}</div>
    @enderror
</div>
@endsection
