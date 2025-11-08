@extends('layouts.master')

@section('titulo')
Modificar pel·lícules {{$peliculas->id}}
@endsection

@section('contenido')
<h1> Pantalla para editar una pelicula </h1>
    

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
           <div class="card">
              <div class="card-header text-center">
                 Modificar pelicula
              </div>
              <div class="card-body" style="padding:30px">
     
                <form action="{{route("catalog.update", ['id' => $peliculas->id])}}" method="post">
                 {{-- TODO: Protección contra CSRF --}}
                 @csrf
                @method('PUT')


                 <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$peliculas->title}}">
                 </div>
     
                 <div class="form-group">
                    <label for="year">Any</label>
                    <input type="text" name="year" id="year" class="form-control" value="{{$peliculas->year}}">
                    
                 </div>
     
                 <div class="form-group">
                   <label for="director">Director</label>
                   <input type="text" name="director" id="director" class="form-control" value="{{$peliculas->director}}">
                    
                 </div>
     
                 <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="text" name="poster" id="poster" class="form-control" value="{{$peliculas->poster}}">
                 
                 </div>
     
                 <div class="form-group">
                    <label for="synopsis">Resumen</label>
                    <textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$peliculas->synopsis}}</textarea>
                 </div>
     
                 <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                        Afegir pel·lícula
                    </button>
                 </div>
                </form>
              </div>
           </div>
        </div>
     </div>
    
@endsection
