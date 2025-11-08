<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cicle;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('cicle')->paginate(10); 
        $cicles = Cicle::orderBy('id', 'asc')->paginate(10);
    
        return view('students.index', compact('students', 'cicles'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required', 'max:200',
            'email' => 'required|email|unique:students,email',
            'address' => 'required',
            'birth_date' => 'required|date',
            'phone_number' => 'required|integer',
        ]);

        $student = new Student();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->birth_date = $request->birth_date;
        $student->phone_number = $request->phone_number;
        $student->save();

        return redirect()->route('students.index');
    }

    public function storeCicle(Request $request)
    {
        
        $validated = $request->validate([
            'cicle_id' => 'required|exists:cicles,id',
        ]);

        // tot i que dona error nose perque el programa funciona correctament
        $student = auth()->user()->student; 

        
        $student->cicle_id = $request->cicle_id;
        $student->save();

       
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', ['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', ['student'=> $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required','max:200',
            'email' => 'required',
            'address' => 'required',
            'birth_date' => 'required|date',
            'phone_number' => 'required|integer',
        ]);

        $students = Student::findOrFail($id);

        $students->name = $request->name;
        $students->email = $request->email;
        $students->address = $request->address;
        $students->birth_date = $request->birth_date;
        $students->phone_number = $request->phone_number;
        $students->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}
