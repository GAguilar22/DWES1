@extends('layouts.master') 

@section('titol') 
    Esdeveniment: {{ $esdeveniment->nom }}
@endsection

@section('contenido')

<div class="row d-flex justify-content-center mt-5" style="min-height: 100vh;">
    
    <!-- Fem un div per a la imatge -->
    <div class="col-sm-4">
        <img src="{{ $esdeveniment->imatge }}" alt="Imatge de l'esdeveniment" class="img-fluid rounded shadow">
        <!-- Mostra la imatge amb classes Bootstrap per millorar l'estètica -->
    </div>

    <!-- Columna per l'esdeveniment -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <h1>Detalls de l'Esdeveniment</h1>
            </div>
            <div class="card-body" style="padding:30px">
                
                <div class="form-group">
                    <label><strong>Nom:</strong></label>
                    <div class="border p-1">{{ $esdeveniment->nom }}</div>
                </div>

                <div class="form-group">
                    <label><strong>Descripció:</strong></label>
                    <div class="border p-1">{{ $esdeveniment->descripcio }}</div>
                </div>

                <div class="form-group">
                    <label><strong>Data:</strong></label>
                    <div class="border p-1">
                        {{ ($esdeveniment->data)}}
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>Hora:</strong></label>
                    <div class="border p-1">{{ $esdeveniment->hora }}</div>
                </div>

                <div class="form-group">
                    <label><strong>Número màxim d'assistents:</strong></label>
                    <div class="border p-1">{{ $esdeveniment->num_max_assistents }}</div>
                </div>

                <div class="form-group">
                    <label><strong>Edat mínima:</strong></label>
                    <div class="border p-1">{{ $esdeveniment->edat_minima }}</div>
                </div>

                @php
                    // Calculem el nombre d'entrades disponibles
                    $numReserves = $esdeveniment->users->count();
                    $entradesDisponibles = $esdeveniment->num_max_assistents - $numReserves;
                @endphp
                <div class="form-group">
                    <label><strong>Entrades disponibles:</strong></label>
                    <div class="border p-1">{{ $entradesDisponibles }}</div>
                </div>

                <div class="form-group text-center mt-4">
                    <!-- Al fer click s'obrirà el modal per confirmar la reserva-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReserva" style="padding:8px 35px;">
                        Reservar
                    </button>
                </div>

                <div class="form-group text-center mt-3">
                    <a href="{{ route('esdeveniments.index') }}" class="btn btn-info" style="padding:8px 100px;">
                        Tornar al llistat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal confirmar reserva -->
<!-- el if(session('error')) l'hem d'utilitzar per comprobar si el error té valor, en aquest cas que ja estigui reservatt
    i el if(session('error')) necessita el display:block per a que a la vista show, es torni a obrir el modal d'error--> 
    
<div class="modal fade @if(session('error')) show @endif" id="modalReserva" tabindex="-1" @if(session('error')) style="display:block;" @else @endif>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Mostrem el títol del modal segons si hi ha error o si és una confirmació de reserva -->
                @if(session('error'))
                    <h5 class="modal-title">Error</h5>
                @else
                    <h5 class="modal-title">Confirmar Reserva</h5>
                @endif
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tancar"></button>
            </div>
            <div class="modal-body">
                @if(session('error'))
                    <p>{{ session('error') }}</p>
                    <!-- Si hi ha error, el modal mostrarà el missatge d'error -->
                @else
                    <!-- Si no hi ha error, es mostra la informació de l'esdeveniment -->
                    <p><strong>Nom:</strong> {{ $esdeveniment->nom }}</p>
                    <p><strong>Data:</strong> {{ $esdeveniment->data }}</p>
                    <p><strong>Hora:</strong> {{ $esdeveniment->hora }}</p>
                    <p>Vols confirmar la reserva d’aquest esdeveniment?</p>
                @endif
            </div>
            <div class="modal-footer">
                @if(session('error'))
                    <a href="{{ route('esdeveniments.show', ['id' => $esdeveniment->id]) }}" class="btn btn-secondary">Tancar</a>
                    <!-- Si hi ha error, es mostra un botó per tornar a la vista de l'esdeveniment -->
                    @elseif(session('success'))
                    <p class="text-success">{{ session('success') }}</p>
                @else
                    <form method="GET" action="{{ route('esdeveniments.reservar', ['id' => $esdeveniment->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Confirmar Reserva</button>
                        <!-- Si no hi ha error, es mostra un formulari amb un botó per confirmar la reserva -->
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <!-- Botó per cancel·lar l'acció i tancar el modal sense confirmar la reserva -->
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
