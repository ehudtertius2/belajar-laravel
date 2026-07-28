@extends('layouts.admin_template')

@section('title', $title)

@section('content')
<div class="col-12">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="font-family: 'Arial', sans-serif; color: #2c3e50; font-weight: bold; font-size: 32px;"><i class="fa fa-user-secret" aria-hidden="true"></i>
Student Management</h1>
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
                                class="btn btn-mini btn-block btn-inverse" data-toggle="modal"
                                data-target="#AddPart" style="font-family: 'Poppins', sans-serif; font-weight: 600; background: #3498db;
                                color: white; border-radius: 8px; padding: 10px 20px;"><i class="fa-solid fa-plus"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->address }}</td>
                            <td
                            align="right">
                                    <a href="#EditPart{{ $item->id }}" data-toggle="modal" data-target="#EditPart{{ $item->id }}"
                                    class="btn btn-success btn-sm"style="font-family: 'Poppins', sans-serif; font-weight: 500; border-radius: 6px;">
    <i class="fa-solid fa-pen-to-square"></i> Edit
</a>
                                <a href="{{ url('student/hapus/' . $item->id) }}" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"
                                    class="btn btn-danger btn-sm"style="font-family: 'Poppins', sans-serif; font-weight: 500; border-radius: 6px;">
    <i class="fa-solid fa-trash"></i> Hapus
</a>
                                </td>

                        </tr>
                        @endforeach
                    </tbody>
                    {{-- Add Part --}}
                    <div class="modal fade" id="AddPart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class='form-horizontal' enctype="multipart/form-data" method="post" action="{{ url('admin/student/simpan') }}">
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
                                        <textarea name="address" class="form-control" placeholder="Address"></textarea>

                                    </fieldset>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Save</button>

                                    </div>

                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                </table>
                    {{-- edit part --}}
                    @foreach ($students as $item)
                    <div class="modal fade" id="EditPart{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel{{ $item->id }}"> Edit data</h3>
                                {{-- Tombol Close Bootstrap 4 --}}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body form">
                                <form class='form-horizontal' enctype="multipart/form-data" method="post" action="{{ url('student/update'. '/' . $item->id) }}">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $item->id }}" class="form-control" readonly>
                                    <div class="col-12">
                                    <fieldset class="form-group">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control"
                                        value="{{ $item->name}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $item->email}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $item->phone}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" >{{ $item->address}}</textarea>

                                    </fieldset>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Save</button>

                                    </div>

                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
