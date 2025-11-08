@extends('layouts.master')

@section('contenido')
    <div class="container mt-5">
        <div class="card shadow">
            <!-- Cabecera del card con el título del esdeveniment -->
            <div class="card-header text-center">
                <h1>Editar Esdeveniment: {{ $esdeveniment->nom }}</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.update', ['id' => $esdeveniment->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="nom"><strong>Nom:</strong></label>
                        <input type="text" id="nom" name="nom" class="form-control" 
                               value="{{ old('nom', $esdeveniment->nom) }}" required>
                        @error('nom')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="descripcio"><strong>Descripció:</strong></label>
                        <textarea id="descripcio" name="descripcio" class="form-control" required>{{ old('descripcio', $esdeveniment->descripcio) }}</textarea>
                        @error('descripcio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="data"><strong>Data:</strong></label>
                        <input type="date" id="data" name="data" class="form-control" 
                               value="{{ old('data', $esdeveniment->data) }}" required>
                        @error('data')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="hora"><strong>Hora:</strong></label>
                        <input type="time" id="hora" name="hora" class="form-control" 
                               value="{{ old('hora', $esdeveniment->hora) }}" required>
                        @error('hora')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="num_max_assistents"><strong>Número màxim d'assistents:</strong></label>
                        <input type="number" id="num_max_assistents" name="num_max_assistents" class="form-control" 
                               value="{{ old('num_max_assistents', $esdeveniment->num_max_assistents) }}" required>
                        @error('num_max_assistents')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="edat_minima"><strong>Edat mínima:</strong></label>
                        <input type="number" id="edat_minima" name="edat_minima" class="form-control" 
                               value="{{ old('edat_minima', $esdeveniment->edat_minima) }}" required>
                        @error('edat_minima')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Input para la imagen añadido -->
                    <div class="form-group mb-3">
                        <label for="imatge"><strong>Imatge (URL):</strong></label>
                        <input type="text" id="imatge" name="imatge" class="form-control" 
                               value="{{ old('imatge', $esdeveniment->imatge) }}" required>
                        @error('imatge')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Guardar canvis</button>
                        <a href="{{ route('admin.show', ['id' => $esdeveniment->id]) }}" class="btn btn-secondary">Tornar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
