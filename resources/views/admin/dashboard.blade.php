@extends('layouts.admin_template')

@section('title', $title)

@section('content')
<div class="col-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
            </div>
            <div class="col-12">
                <p>Welcome to the admin dashboard!</p>
            </div>
            @if(@session('role') === 'Admin')
            <a href="{{route('student')}}" class="col-md-4">
                <div class="card text-white text-center bg-secondary pt-3 mb-9">
                    <i class="fa-solid fa-user-graduate fa-6x" ></i>
                    <div class="card-body">
                        <h5 class="card-title">Student Management</h5>
                    </div>
                </div>
            </a>
            <a href="{{route('user.index')}}" class="col-md-4">
                <div class="card text-white text-center bg-info pt-3 mb-9">
                    <i class="fa fa-user fa-6x" style="color:rgb(4, 30, 81)""></i>
                    <div class="card-body">
                        <h5 class="card-title">User Management</h5>
                    </div>
                </div>
            </a>
            @endif
            <a href="{{route('blog.index')}}" class="col-md-4">
                <div class="card text-white text-center bg-warning pt-3 mb-9" >
                    <i class="fa-solid fa-blog fa-6x" style="color:rgb(255, 85, 0)"></i>
                    <div class="card-body">
                        <h5 class="card-title">Blog Management</h5>
                    </div>
                </div>
            </a>
            <a href="{{route('mapel')}}" class="col-md-4">
                <div class="card text-white text-center bg-primary pt-3 mb-9" >
                    <i class="fa-solid fa-book fa-6x" style="color: rgb(177, 151, 252);"></i>
                    <div class="card-body">
                        <h5 class="card-title">Mapel Management</h5>
                    </div>
                </div>
            </a>


        </div>
    </div>
</div>

@endsection
