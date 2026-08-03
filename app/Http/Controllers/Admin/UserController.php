<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return "hali kami sedang belajar laravel"

        $users = User::with('role')->get();

        // die;
        $title = "User Management";
        return view('admin.user.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function simpan(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'address' => 'required',
    //     ]);


    //     User::create($request->all());

    //     return redirect()->route('user')->with('sukses','user berhasil ditambar');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);
        $user->update(['id_role' => $request->role,]);

        return redirect()->back()->with('success', 'user updated successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'user updated successfully.');
    }
}
