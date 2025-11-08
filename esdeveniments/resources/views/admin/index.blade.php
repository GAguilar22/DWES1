@extends('layouts.master')

@section('contenido')
    <div class="container mt-4">
        <h1 class="mb-4">Esdeveniments per Categoria</h1>

        
        <!-- Foreach per a cada categoria-->
        @foreach($categories as $category)
            <h2 class="mt-4">{{ $category->nom }}
            <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE') 
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
            </form>
            </h2>
            @if($category->esdeveniments()->count() > 0)

            <div class="row">
                <!-- Foreach per a cada card -->
                @foreach($category->esdeveniments as $esdeveniment)
                    @php
                        // Controlem si l'usuari ja està registrat en un esdeveniment
                        $reservat = Auth::check() && $esdeveniment->users->contains(Auth::user()->id);

                        // Calculem el número d'entrades disponibles
                        $entradesDisponibles = $esdeveniment->num_max_assistents - $esdeveniment->users->count();
                    @endphp

                    <div class="col-md-4 mb-3">                        
                        <!-- Si la variable $reservat es true li apliquem estils de boostrap-->
                        <div class="card @if($reservat) border-success reserved @endif">
                            
                            <!-- href per anar a la vista show -->
                            <a href="{{ route('admin.show', ['id' => $esdeveniment->id]) }}">
                                <img src="{{ $esdeveniment->imatge }}" 
                                     class="card-img-top" 
                                     alt="{{ $esdeveniment->nom }}" 
                                     style="height: 200px; object-fit: cover;">
                            </a>

                            <div class="card-body">
                                <h5 class="card-title">{{ $esdeveniment->nom }}</h5>
                                
                                <p class="card-text">
                                    Data: {{ $esdeveniment->data }}
                                </p>

                                <p class="card-text">
                                     Hora: {{ $esdeveniment->hora }}
                                </p>

                                <p class="card-text">
                                    Entrades disponibles: {{ $entradesDisponibles }}
                                </p>

                            </div>

                            <div class="card-footer text-center">
                                <!-- Els botons només apareix si l'usuari està verificat i té el rol d'admin-->
                                @if(Auth::check() && Auth::user()->rol === 'admin')
                                    <a href="{{ route('admin.edit', ['id' => $esdeveniment->id]) }}" class="btn btn-warning btn-sm">
                                        Editar
                                    </a>
                                    
                                    <form action="{{ route('admin.destroy', ['id' => $esdeveniment->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE') 
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estàs segur de eliminar aquest esdeveniment?');">
                                            Eliminar
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
@endsection
