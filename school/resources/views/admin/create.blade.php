@extends('layouts.master')

@section('titulo', 'Afegir un cicle')


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
                     <h1>Afegir Cicle</h1>
                  </div>

                  <div class="card-body" style="padding:30px">
                    <form action="{{route('admin.store')}}" method="post">
                    @csrf


                            <div class="form-group">
                                <label for="code">Codi</label>
                                <input type="text" name="code" id="code" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control" >
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Descripcio</label>
                                <input type="text" name="description" id="description" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="num_courses">Numero de cursos</label>
                                <input type="number" name="num_courses" id="num_courses" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="image">Imatge</label>
                                <select name="image" id="image" class="form-control">
                                    <option value="">Selecciona una imatge</option>
                                    <option value="imatges/DAM1.jpg">DAM</option>
                                    <option value="imatges/DAW1.jpg">DAW</option>
                                    <option value="imatges/asix1.jpg">ASIX</option>
                                </select>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success" style="padding:8px 100px;margin-top:25px;">
                                    Afegir Cicle
                                </button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
@endsection