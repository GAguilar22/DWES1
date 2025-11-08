<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Esdeveniment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EsdevenimentController extends Controller
{

    public function index()
    {
        // Hem d'utilitzar el with('esdeveniments.users')->get();
        // Per a saber si un usuari ja està registrat i així mostrar-ho al index
        $categories = Categoria::with('esdeveniments.users')->get();

        // Retornem la vista i els esdeveniments
        return view('esdeveniments.index', compact('categories'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        $esdeveniment = Esdeveniment::findOrFail($id); 
        
        // l'enviem a la vista show amb l'esdeveniment
        return view('esdeveniments.show', compact('esdeveniment')); 
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    // Funció per reservar un esdeveniment, primer comprovarem si l'usuari ja està registrat o no
    public function reservar($id)
    {
        $esdeveniment = Esdeveniment::findOrFail($id);
        $user = Auth::user();

        /* Comprovem que en la base de dades, l'usuari no estigui ja 
        registrat en aquest esdeveniment, si ja el té reservat, li mostrarem un missatge. */
    
        $exists = DB::table('user_esdeveniments')
                    ->where('user_id', $user->id)
                    ->where('esdev_id', $esdeveniment->id)
                    ->exists();

        if ($exists) {
            // Si ja està registrat, el tornarem a enviar a la vista `show` i mostrarem el missatge
            return redirect()->route('esdeveniments.show', ['id' => $esdeveniment->id])->with('error', 'Ja estàs registrat en aquest esdeveniment.');
        }

        // Insertem la reserva a la base de dades
        DB::table('user_esdeveniments')->insert([
            'user_id' => $user->id,
            'esdev_id' => $esdeveniment->id,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        // Redirigim l'usuari a la pàgina `index.blade.php`
        return redirect()->route('esdeveniments.index')->with('success', 'Reserva confirmada!');
    }

    public function cancelarReserva($id)
    {
        $esdeveniment = Esdeveniment::findOrFail($id);
        $user = Auth::user();

        // Comprovem si l'usuari està registrat en un esdeveniment
        $exists = DB::table('user_esdeveniments')
                    ->where('user_id', $user->id)
                    ->where('esdev_id', $esdeveniment->id)
                    ->exists();

        if (!$exists) {
            return redirect()->route('esdeveniments.show', ['id' => $esdeveniment->id]);
        }

        // Eliminem el registre de l'usuari per a l'esdeveniment
        DB::table('user_esdeveniments')
            ->where('user_id', $user->id)
            ->where('esdev_id', $esdeveniment->id)
            ->delete();

        return redirect()->route('esdeveniments.index')->with('cancelSuccess', 'Has cancel·lat la reserva correctament.');
    }


    public function destroy(string $id)
    {
        //
    }
}
