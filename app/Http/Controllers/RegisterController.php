<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('admin.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function actionRegister(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            ]);
            // var_dump("test");
            // die;
            $emailExists = User::where('email', $request->input('email'))->exists();


        if ($emailExists) {
            return redirect()->back()->withErrors(['email' => 'Email already exists.']);
        } else{
            $user = new User();
            $user->name = $request->input('fname') . ' ' .
            $request->input('lname');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role = 'user'; //set the role to 'user' for regultion
            $user->save();
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
