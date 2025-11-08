@extends('layouts.master')


@section('contenido')


<div class="row">
    @foreach( $peliculas as $peli )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ url('/catalog/show/' . $peli->id ) }}">
            <img src="{{$peli->poster}}" style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$peli->title}}
            </h4>
        </a>
    </div>    
    @endforeach
    <div class="mt-4 w-100 d-flex justify-content-end">
        {{$peliculas->links()}}
    </div>

</div>

@endsection
