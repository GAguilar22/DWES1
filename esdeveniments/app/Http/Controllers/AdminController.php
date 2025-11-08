<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Esdeveniment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categoria::with('esdeveniments.users')->get();

        // Retornem la vista i els esdeveniments
        return view('admin.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categoria::all();
        // Retornem la vista `create` amb les categories disponibles
        return view('admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validem les dades
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'required|string',
            'data' => 'required|date',
            'hora' => 'required', 
            'num_max_assistents' => 'required|integer',
            'edat_minima' => 'required|integer',
            'imatge' => 'required|url',
            'categoria_id' => 'required|exists:categories,id',
        ]);

        // Creem un nou esdeveniment
        Esdeveniment::create($validatedData);

        // Redirigim al index
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $esdeveniment = Esdeveniment::findOrFail($id); 
        // l'enviem a la vista show amb l'esdeveniment
        return view('admin.show', compact('esdeveniment')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $esdeveniment = Esdeveniment::findOrFail($id);
        return view('admin.edit', compact('esdeveniment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                $esdeveniment = Esdeveniment::findOrFail($id); 

        // Validem les dades 
        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'required|string',
            'data' => 'required|date',
            'hora' => 'required',
            'num_max_assistents' => 'required|integer|min:1',
            'edat_minima' => 'required|integer|min:0',
            'imatge' => 'required|url', 
        ]);

        // Actualitzem l'esdeveniment
        $esdeveniment->update([
            'nom' => $request->nom,
            'descripcio' => $request->descripcio,
            'data' => $request->data,
            'hora' => $request->hora,
            'num_max_assistents' => $request->num_max_assistents,
            'edat_minima' => $request->edat_minima,
            'imatge' => $request->imatge,
        ]);

        return redirect()->route('admin.show', ['id' => $esdeveniment->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $esdeveniment = Esdeveniment::findOrFail($id);

        $esdeveniment->delete();
        return redirect()->route('admin.index');
    }
}
