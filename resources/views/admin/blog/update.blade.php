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
                        <form action="{{route('blog.update', $item->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title blog" value="{{ $item->title}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Sub Content</label>
                                <textarea class="form-control" name="sub_content" id="" cols="30" rows="10" required>{{ $item->sub_content}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Content</label>
                                <textarea class="form-control" name="content" cols="30" rows="10" >{{ $item->content}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Photo</label>
                                <input name="photo" type="file" value="{{ $item->photo}}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <input name="is_active" type="radio" value="1" {{ $item->is_active == 1 ? 'checked' : ''}}> Publish
                                <input name="is_active" type="radio" value="0" {{ $item->is_active == 0 ? 'checked' : ''}}> Draft
                            </div>
                            <button class="btn btn-primary" type="submit">Save</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
