@extends('layouts.master')

@section('titulo')
    Alumne: {{$student->name}}    
@endsection

@section('contenido')


    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
           <div class="card">
              <div class="card-header text-center">
                <h1>Editar alumne</h1>
              </div>
              <div class="card-body" style="padding:30px">
     

                <form action="{{route("students.update", ['id' => $student->id])}}" method="post">
                 
                @csrf

                @method('PUT')


                 <div class="form-group">
                    <label for="name"><strong>Nom </strong></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}">
                 </div>
     
                 <div class="form-group">
                    <label for="email"><strong>Email </strong></label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$student->email}}">
                 </div>
     
                 <div class="form-group">
                   <label for="address"><strong>Adreça</strong></label>
                   <input type="text" name="address" id="address" class="form-control" value="{{$student->address}}">
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