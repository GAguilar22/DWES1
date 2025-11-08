@extends('layouts.master')

@section('titulo', 'Crear Nova Categoria')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Errors per a la validació -->
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
                    <h1>Nova Categoria</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la Categoria</label>
                            <input type="text" name="nom" id="nom" class="form-control" required>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success">Crear Categoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
