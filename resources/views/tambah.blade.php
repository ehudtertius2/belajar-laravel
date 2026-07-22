@extends('belajar')
@section('content')
    <form action="{{route('store-tambah')}}" method="post">
        @csrf
        {{-- 419 --}}
        <div class="mb-3">
            <label for="">Angka 1</label>
            <input type="number" placeholder="Masukkan Angka" name="angka1">
        </div>
        <br>
        <div class="mb-3">
            <label for="">Angka 2</label>
            <input type="number" placeholder="Masukkan Angka" name="angka2">
        </div>
        <br>
        <button type="submit">Simpan</button>
        <a href="{{route('belajar-laravel')}}">Back</a>

    </form>

    <h3>Hasilnya adalah : {{$jumlah}} </h3>

@endsection
