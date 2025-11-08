@extends('layouts.master')

@section('titulo', 'Crear Nou Esdeveniment')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header text-center">
                    <h1>Nou Esdeveniment</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de l'esdeveniment</label>
                            <input type="text" name="nom" id="nom" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="descripcio" class="form-label">Descripció</label>
                            <textarea name="descripcio" id="descripcio" rows="4" class="form-control" ></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="date" name="data" id="data" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora</label>
                            <input type="time" name="hora" id="hora" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="num_max_assistents" class="form-label">Número màxim d'assistents</label>
                            <input type="number" name="num_max_assistents" id="num_max_assistents" class="form-control" >
                        </div>

                        <div class="mb-3">
                            <label for="edat_minima" class="form-label">Edat mínima</label>
                            <input type="number" name="edat_minima" id="edat_minima" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="imatge" class="form-label">URL de la imatge de l'esdeveniment</label>
                            <input type="text" name="imatge" id="imatge" class="form-control" placeholder="Introdueix la URL de la imatge">
                        </div>

                        {{-- Utilizem un camp Select per a que al crear un nou esdeveniment ja li assignem una categoria --}}
                        
                            <div class="mb-3">
                                <label for="categoria_id" class="form-label">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-select">
                                    <option value="">Selecciona una categoria</option>
                                    @foreach($categories as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                       

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Crear Esdeveniment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
