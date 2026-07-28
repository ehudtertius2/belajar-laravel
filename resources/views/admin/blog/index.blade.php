@extends('layouts.admin_template')
@section('title','Data Blog')

@section('content')
<div class="">
    <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold">{{$title ?? ''}}</h6>
                    </div>
                    <div class="card-body">
                        <div align="right" class="mb">
                            <a href="{{route('blog.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>  ADD NEW</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $index => $x)

                                <tr>
                                    <td>{{ $index += 1 }}</td>
                                    <td>{{ $x->title }}</td>
                                    <td>{{ $x->content }}</td>
                                    <td><img width="100" src="{{asset('storage/'.$x->photo)}}" alt="img"></td>
                                    <td>{{ $x->is_active }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="" class="d-inline" method="post">
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
