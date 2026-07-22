<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
</head>
<body>
    <h1>{{$title ?? ''}}</h1>
    <a href="{{route("penjumlahan")}}">PENJUMLAHAN➕</a>

    <a href="{{route("pengurangan")}}">PENGURANGAN➖</a>

    <a href="{{route("pembagian")}}">PEMBAGIAN➗</a>

    <a href="{{route("perkalian")}}">PERKALIAN✖️</a>

    <br><br>

    <div class="content">
        @yield('content')
        {{-- parent: untuk jadi acuan memanggil/ mengisi anak" componen template nya --}}
    </div>
</body>
</html>
