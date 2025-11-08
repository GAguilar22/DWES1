<?php

namespace App\Http\Controllers;

use App\Models\Cicle;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Funcio que utilitzem per a passar la vista on l'estudiant tria el cicle
    public function selectCicle()
    {
        $cicles = Cicle::all();
        return view('students.selectCicle', compact('cicles'));
    }


    public function index()
    {

    $cicles = Cicle::orderBy('id', 'asc')->paginate(10);
    $students = Student::orderBy('id', 'asc')->paginate(10);
    
    return view('students.index', compact('cicles', 'students'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'=> 'required',
            'name' => 'required',
            'description' => 'required',
            'num_courses' => 'required|integer',
            'image' => 'required',
        ]);

        $cicle = new Cicle();

        $cicle->code = $request->code;
        $cicle->name = $request->name;
        $cicle->description = $request->description;
        $cicle->num_courses = $request->num_courses;
        $cicle->image = $request->image;
        $cicle->save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cicle = Cicle::findOrFail($id);
        return view('admin.show', ['cicle' =>$cicle]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cicle = Cicle::findOrFail($id);
        return view('admin.edit', ['cicle' => $cicle]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'code'=> 'required',
            'name' => 'required',
            'description' => 'required',
            'num_courses' => 'required|integer',
            'image' => 'required|url',
        ]);

        $cicle = Cicle::findOrFail($id);

        $cicle->code = $request->code;
        $cicle->name = $request->name;
        $cicle->description = $request->description;
        $cicle->num_courses = $request->num_courses;
        $cicle->image = $request->image;

        $cicle->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cicle = Cicle::findOrFail($id);
        $cicle->delete();

        return redirect()->route('students.index');
    }
}
