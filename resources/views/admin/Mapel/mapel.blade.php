@extends('layouts.admin_template')

@section('title', $title)

@section('content')
<div class="col-12">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 style="font-family: 'Arial', sans-serif; color: #002c58; font-weight: bold; font-size: 32px;">
                    <i class="fa-brands fa-leanpub" style="color: rgb(0, 76, 136);"></i>
                    Mapel Management</h1>
            </div>
            <div class="col-12">
                <table id="student" class="table tblack" style="color: #170da4 !important;">
                    <thead class="bg-white">
                        <tr>
                            {{-- <th> No </th> --}}
                            {{-- <th><i class="fa fa-tag" aria-hidden="true"></i> id</th> --}}
                            <th style="width: 75%"><i></i> Nama Mapel</th>
                            <th style="width: 25%; text-align: center ; class="text-center"><a href="#AddPart"
                                class="btn btn-mini btn-block btn-inverse" data-toggle="modal"
                                data-target="#AddPart" style="font-family: 'Poppins', sans-serif; font-weight: 600; background: #3498db;
                                color: white; border-radius: 8px; padding: 10px 20px;"> <i class="fa-solid fa-book" style="color: rgb(255, 255, 255);"></i></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapel as $item)
                        <tr>
                            {{-- <td>{{($students->currentPage() - 1) * $students->perPage() + $loop->iteration}}</td> --}}
                            {{-- <td>{{ $item->id }}</td> --}}
                            <td>{{ $item->name }}</td>
                            <td
                            align="middle"><a href="#EditPart{{ $item->id }}" data-toggle="modal" data-target="#EditPart{{ $item->id }}"
                                class="btn btn-success btn-sm"style="font-family: 'Poppins', sans-serif; font-weight: 500; border-radius: 6px;">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <a href="{{ url('admin/mapel/hapus/' . $item->id) }}" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')"
                                    class="btn btn-danger btn-sm"style="font-family: 'Poppins', sans-serif; font-weight: 500; border-radius: 6px;">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </a>
                                </td>



                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <div class="mt-3">

                        {{$students->links()}}
                    </div> --}}
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
                                <form class='form-horizontal' enctype="multipart/form-data" method="post" action="{{ url('admin/mapel/simpan') }}">
                                    @csrf
                                    <div class="row">
                                    <div class="col-12">
                                    <fieldset>
                                        <label class="form-label">Nama MataPelajaran</label>
                                        <input type="text" name="name" class="form-control"
                                        placeholder="mapel?">
                                    </fieldset>
                                    {{-- <fieldset class="form-group">
                                        <label class="form-label">Nama MataPelajaran</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </fieldset> --}}
                                    {{-- <fieldset class="form-group">
                                        <label class="form-label">📞Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="phone">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">🏠Address</label>
                                        <textarea name="address" class="form-control" placeholder="Address"></textarea> --}}

                                    </fieldset>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary">submit</button>

                                    </div>

                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                </table>
                    {{-- edit part --}}
                    @foreach ($mapel as $item)
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
                                <form class='form-horizontal' enctype="multipart/form-data" method="post" action="{{ url('admin/mapel/update'. '/' . $item->id) }}">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $item->id }}" class="form-control" readonly>
                                    <div class="col-12">
                                    <fieldset class="form-group">
                                        <label class="form-label">Nama MataPelajaran</label>
                                        <input type="text" name="name" class="form-control"
                                        value="{{ $item->name}}">
                                    </fieldset>
                                    {{-- <fieldset class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $item->email}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $item->phone}}">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" >{{ $item->address}}</textarea> --}}

                                    {{-- </fieldset> --}}
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
