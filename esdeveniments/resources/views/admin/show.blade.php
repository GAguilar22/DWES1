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

                        <a href="{{ route('admin.edit', ['id' => $esdeveniment->id]) }}" class="btn btn-warning" style="padding:8px 35px;">
                            Editar
                        </a>

                        <form action="{{ route('admin.destroy', ['id' => $esdeveniment->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding:8px 35px;" onclick="return confirm('¿Estàs segur d\'eliminar aquest esdeveniment?');">
                                Eliminar
                            </button>
                        </form>

                </div>

                <div class="form-group text-center mt-3">
                    <a href="{{ route('admin.index') }}" class="btn btn-info" style="padding:8px 100px;">
                        Tornar al llistat
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
