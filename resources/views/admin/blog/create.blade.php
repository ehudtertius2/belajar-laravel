@extends('layouts.admin_template')
@section('title','Create New Blog')

@section('content')
<div class="">
    <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="font-weight-bold">{{$title ?? ''}}</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title blog" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Sub Content</label>
                                <textarea class="form-control" name="sub_content" id="" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Content</label>
                                <textarea class="form-control" name="content" cols="30" rows="10" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <input name="photo" type="file" >
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <input name="is_active" type="radio" value="1" checked> Publish
                                <input name="is_active" type="radio" value="0"> Draft
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
