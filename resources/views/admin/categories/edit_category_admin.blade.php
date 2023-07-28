@extends('admin.app_admin')
@section('content')
<div class="page-container">
    <div style="
    padding-top: 95px; padding-left: 15px;">

        <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Category Name:</Strong>
                        <input value="{{$category->name}}" type="text" name="name" class="form-control" placeholder="Brand Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Brand Description:</Strong>
                        <input value="{{$category->description}}" type="text" name="description" class="form-control" placeholder="Brand Description">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Brand Logo:</Strong>
                        <input type="file" name="image" class="form-control-file" placeholder="Brand logo">
                        @error('logo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <strong>Logo cũ</strong>
                        <img src="{{asset('/storage/images/categories/'.$category->image)}}" style="height: 50px;width:100px;" alt="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection