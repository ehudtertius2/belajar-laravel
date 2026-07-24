@extends('template.admin_template')

@section('title', $title)

@section('content')
<div class="col-12">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Student Management</h1>
            </div>
            <div class="col-12">
                <table id="student" class="table" style="color: #000 !important;">
                    <thead class="bg-white">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-center"><a href="#AddPart"
                                class="btn btn-mini btn-block btn-inverse" data-toggle="modal" data-target="#AddPart">Tambah data</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td align="center"><a class="me-2" href="#EditPart{{ $item->id }}"
                                data-toggle="modal" data-target="#EditPart{{$item->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ url('student/hapus/' . $item->id)}}" onclick="return confirm('Data akan di hapus?')">
                                    </a><a href="#EditPart{{ $item->id }}" data-toggle="modal" data-target="#EditPart{{ $item->id }}"
                                    class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ url('student/hapus/' . $item->id) }}" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"
                                    class="btn btn-danger btn-sm">Hapus</a>
                                </td>

                        </tr>
                        @endforeach
                    </tbody>
                    <div class="modal fade" id="AddPart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class='form-horizontal' enctype="multipart/form-data" method="post" action="{{ url('student/simpan') }}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-12">
                                    <fieldset>
                                        <label class="form-label">nama</label>
                                        <input type="text" name="name" class="form-control"
                                        placeholder="Nama Student">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="phone">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="addresss" class="form-control" placeholder="Address"></textarea>

                                    </fieldset>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Save</button>

                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                        </div>
                </table>
                {{-- Add Part --}}

            </div>
        </div>
    </div>
</div>
@endsection
