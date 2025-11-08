@extends('layouts.master')

@section('titol')
    Cicle: {{$cicle->code}}    
@endsection

@section('contenido')


<div class="row d-flex justify-content-center mt-5" style="min-height: 100vh;">

    <div class="col-sm-2">
        <img src="{{ asset($cicle->image) }}" alt="Imatge del cicle" class="img-fluid rounded shadow">
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header text-center">
                <h1>Detalls del Cicle</h1>
            </div>
            <div class="card-body" style="padding:30px">
                <div class="form-group">
                    <label><strong>Codi:</strong></label>
                    <div class="border p-1">{{ $cicle->code }}</div>
                </div>
                <div class="form-group">
                    <label><strong>Nom:</strong></label>
                    <div class="border p-1">{{ $cicle->name }}</div>
                </div>
                <div class="form-group">
                    <label><strong>Descripció:</strong></label>
                    <div class="border p-1">{{ $cicle->description }}</div>
                </div>
                <div class="form-group">
                    <label><strong>Número de cursos:</strong></label>
                    <div class="border p-1">{{ $cicle->num_courses }}</div>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('students.index') }}" class="btn btn-info" style="padding:8px 100px; margin-top:25px;">
                        Tornar al llistat
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
