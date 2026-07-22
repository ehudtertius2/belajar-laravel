<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajaController extends Controller
{
    public function index(){
        // return "Halo kami sedang belajar laravel";
        $title = "Belajar math dasar";
        return view('belajar', compact('title'));
    }



    public function tambah(){
        $jumlah = 0;
        $title = "Gacor kang"; //{{--n gtur nya bisa langsung dari controller --}}
        return view('tambah', compact('jumlah', 'title'));

    }

    public function storetambah(Request $request){
        // $request = new Request();
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }

    public function kurang(){
        $title = "data pengurangan";
        $jumlah = 0;
        return view('kurang', compact('jumlah', 'title'));
    }

    public function storekurang(Request $request){
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = max (0,$angka1 - $angka2);
        return view('kurang', compact('jumlah'));
    }
    public function bagi(){
        $title = "data pembagian";
        $jumlah = 0;
        return view('bagi', compact('jumlah', 'title'));
    }

    public function storebagi(Request $request){
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = ($angka1 / $angka2);
        return view('bagi', compact('jumlah'));
    }

    public function kali(){
        $title = "data perkalian";
        $jumlah = 0;
        return view('kali', compact('jumlah', 'title'));
    }

    public function storekali(Request $request){
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $jumlah = ($angka1 * $angka2);
        return view('kali', compact('jumlah'));
    }
}
