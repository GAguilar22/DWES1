@extends('layouts.master')

@section('titulo')
    Pelicula nova
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center my-4">Alta de Pel·lícula</h2>
        <img class="img-fluid" src="{{$peliculas->poster}}" style="height:200px"/>    
        <h2>{{$peliculas->title}}</h2>
        <p><strong>Any: </strong> {{$peliculas->year}}</p>
        <p><strong>Director: </strong>{{$peliculas->director}}</p>
        <p><strong>Resum: </strong>{{$peliculas->synopsis}}</p>           
    </div>
</div>
@endsection