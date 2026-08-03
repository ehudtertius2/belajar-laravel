<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // pagination manual
        // $students = Student::paginate(5);
        // pagination datatables
        $mapel = Mapel::all();
        $title = "mata pelajaran Table";
        return view('admin.Mapel.mapel', compact('title', 'mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);


        Mapel::create($request->all());

        return redirect()->route('mapel')->with('sukses','mapel berhasil ditambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update($request->all());

        return redirect()->route('mapel')->with('success', 'mapel updated successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function hapus($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->route('mapel')->with('success', 'mapel updated successfully.');
    }
}
