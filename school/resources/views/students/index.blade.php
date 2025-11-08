@extends('layouts.master')

@section('titol')
    Llista alumnes    
@endsection

@section('contenido')
    <!-- Vaig intentar utilitzar el Middleware per a que l'admin tingues les seves propies vistes pero no parava de donar-me erros
        aixi que vaig optar per utilitzar un if per a comprovar que si el correu coincidis amb el de l'admin pogues veure i modificar els cursos -->
    @if (Auth::check() && Auth::user()->email == 'admin@admin.cat')
        <h1 class="text-center my-4">Llista de cicles</h1>

        <div class="container">
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($cicles as $cicle)
                    <div class="card shadow m-3" style="width: 25rem;">
                        <!-- al guardar les imatges predeterminades a la carpeta public/imatges, hem d'utilitzar asset per a l'hora de carregar l'arxiu
                            Laravel sapiga que ho tenim a la carpeta public/imatges en aquest cas -->
                        <img src="{{ asset($cicle->image) }}" alt="Imatge del cicle" class="card-img-top" style="height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $cicle->name }}</h5>
                            <a href="{{route('admin.show', $cicle->id)}}" class="btn btn-info me-2">
                                Entrar
                            </a>

                            <a href="{{ route('admin.edit', $cicle->id) }}" class="btn btn-warning me-2">
                                Modificar cicle
                            </a>

                            <form action="{{ route('admin.destroy', $cicle->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mt-2">
                                    Eliminar cicle
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <h1 class="text-center my-4">Llista d'alumnes</h1>
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adreça</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>
                        <a href="{{ url('/students/show/' . $student->id ) }}" class="text-decoration-none text-primary">
                            {{ $student->name }}
                        </a>
                    </td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 w-100 d-flex justify-content-end">
            {{$students->links()}}
        </div>
    </div>

@endsection
