@extends('layouts.master')

@section('contenido')

<div class="row">
    <div class="col-sm-4">
        <img src="{{$peliculas->poster}}" alt="Poster de {{$peliculas->title}}" style="width:100%">
    </div>
    <div class="col-sm-8">
        <h3>{{$peliculas->title}}</h3>
        <p><strong>Any:</strong> {{$peliculas->year}}</p>
        <p><strong>Director:</strong> {{$peliculas->director}}</p>
        <p><strong>Resum:</strong> {{$peliculas->synopsis}}</p>
        
        <!--Ayuda que nos da Laravel con .blade, también se podria hacer abriendo un bloque de php -->
        @if ($peliculas->rented == false)
            <p>Pel·lícula disponible</p>
            <a href="#" class="btn btn-primary">Alquilar pel·lícula</a>
        @else
            <p>Pel·lícula actualment llogada</p>
            <a href="#" class="btn btn-danger">Devolver pel·lícula</a>
        @endif

        <a href="{{ url('/catalog/edit/' . $peliculas->id) }}" class="btn btn-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
            Modificar pel·lícula
        </a>
        <a href="{{ url('/catalog/destroy/' . $peliculas->id) }}" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
            </svg>
            Borrar pel·lícula
        </a>

        <a href="{{ url('/catalog') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
</div>

@endsection

    <!--Diferents mètodes de pasar una utilitzar una variable
    <h1>Hola, has triat la pel·lícula <?php //echo $id;  ?> </h1>
    <h1>Hola, has triat la pel·lícula <?//= $id ?> </h1>-->
    
