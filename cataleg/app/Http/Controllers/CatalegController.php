<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
 
class CatalegController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $peliculas = Movie::orderBy('id', 'asc')->paginate(12);
		return view('catalog.index', array('peliculas'=>$peliculas));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $pelicula = new Movie();
      $pelicula->title = $request->title;
      $pelicula->year = $request-> year;
      $pelicula->director= $request->director;
      $pelicula->poster = $request->poster;
      $pelicula->synopsis = $request->synopsis;
      $pelicula ->rented = false;
      $pelicula->save();

      $peliculas = Movie::all();
      return redirect()->route('/catalog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $pelicula = Movie::findorFail($id);
      return view('catalog.show', array('peliculas' => $pelicula, 'id'=> $id));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $peliculas = Movie::findorFail($id);
        return view('catalog.edit',['peliculas'=> $peliculas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peliculas = Movie::findOrFail($id);

        $peliculas->title = $request->title;
        $peliculas->year = $request-> year;
        $peliculas->director= $request->director;
        $peliculas->poster = $request->poster;
        $peliculas->synopsis = $request->synopsis;
        $peliculas ->rented = false;
        $peliculas->save();

      return redirect()->route('catalog.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peliculas = Movie::findOrFail($id);

        $peliculas->destroy($id);

        return redirect()->route('catalog.index');
    }
}
