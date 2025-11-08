@extends('layouts.master')

@section('titulo', 'Afegir un estudiant')


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
                     <h1>Afegir alumne</h1>
                  </div>

                  <div class="card-body" style="padding:30px">
                    <form action="{{route('students.store')}}" method="post">
                    @csrf


                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" >
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Adreça</label>
                                <input type="text" name="address" id="address" class="form-control" >
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="padding:8px 100px;margin-top:25px;">
                                    Afegir alumne
                                </button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>

@endsection