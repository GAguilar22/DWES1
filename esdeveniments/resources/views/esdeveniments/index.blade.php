@extends('layouts.master')

@section('contenido')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Esdeveniments per Categoria</h1>

        @foreach($categories as $category)
            <h2 class="mt-4">{{ $category->nom }}</h2> 
            
            @if($category->esdeveniments()->count() > 0)
            
            <div class="row">
                @foreach($category->esdeveniments as $esdeveniment)
                    @php
                        $reservat = Auth::check() && $esdeveniment->users->contains(Auth::user()->id);
                        $entradesDisponibles = $esdeveniment->num_max_assistents - $esdeveniment->users->count();
                    @endphp

                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm @if($reservat) border-success reserved @endif">
                            <a href="{{ route('esdeveniments.show', ['id' => $esdeveniment->id]) }}">
                                <img src="{{ $esdeveniment->imatge }}" class="card-img-top rounded" alt="{{ $esdeveniment->nom }}" style="height: 200px; object-fit: cover;">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">{{ $esdeveniment->nom }}</h5>
                                <p class="card-text"><strong>Data:</strong> {{ $esdeveniment->data }}</p>
                                <p class="card-text"><strong>Hora:</strong> {{ $esdeveniment->hora }}</p>
                                <p class="card-text"><strong>Entrades disponibles:</strong> {{ $entradesDisponibles }}</p>

                                @if($reservat)
                                    <span class="badge bg-success">Reservat</span>
                                @endif
                            </div>
                            
                            <div class="card-footer text-center">
                                @if($reservat)
                                    <form action="{{ route('esdeveniments.cancelar', ['id' => $esdeveniment->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Estàs segur de cancel·lar la teva reserva?');">
                                            Cancel·lar Reserva
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
             @else
            <p>Encara no hi ha esdeveniments en aquesta categoria</p>
            
        @endif
        @endforeach
    </div>

    <!-- Modal de confirmació -->
    <div class="modal fade" id="cancelSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reserva Cancelada</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Has cancel·lat la reserva correctament.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('esdeveniments.index') }}" class="btn btn-primary">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
