@extends('layouts.master')

@section('titulo')
    Cicle: {{$cicle->codi}}    
@endsection

@section('contenido')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
           <div class="card">
              <div class="card-header text-center">
                <h1>Editar cicle</h1>
              </div>
              <div class="card-body" style="padding:30px">
     

                <form action="{{route('admin.update', ['admin' => $cicle->id])}}" method="post">
                 
                @csrf

                @method('PUT')


                 <div class="form-group">
                    <label for="code"><strong>Codi </strong></label>
                    <input type="text" name="code" id="code" class="form-control" value="{{$cicle->code}}">
                 </div>
     
                 <div class="form-group">
                    <label for="name"><strong>Nom </strong></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$cicle->name}}">
                 </div>
     
                 <div class="form-group">
                   <label for="description"><strong>Descripcio</strong></label>
                   <input type="text" name="description" id="description" class="form-control" value="{{$cicle->description}}">
                 </div>

                 <div class="form-group">
                    <label for="num_courses"><strong>Numero de cursos</strong></label>
                    <input type="text" name="num_courses" id="num_courses" class="form-control" value="{{$cicle->num_courses}}">
                  </div>

                  <div class="form-group">
                    <label for="image">Imatge</label>
                    <input type="url" name="image" id="image" class="form-control" value="{{$cicle->image}}">
                </div>

                 <div class="form-group text-center">
                    <button type="submit" class="btn btn-success" style="padding:8px 100px;margin-top:25px;">
                        Guardar canvis
                    </button>
                 </div>
                
                </form>
              </div>
           </div>
        </div>
     </div>
    
@endsection