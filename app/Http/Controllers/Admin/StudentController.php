<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return "hali kami sedang belajar laravel"
        $students = Student::all();
        $title = "Student Table";
        return view('admin.student', compact('title', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);


        Student::create($request->all());

        return redirect()->route('student')->with('sukses','student berhasil ditambar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('student')->with('success', 'Student updated successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function hapus($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student')->with('success', 'Student updated successfully.');
    }
}
