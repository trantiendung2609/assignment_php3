@extends('admin.app_admin')
@section('content')
<div class="page-container">
    <div style="
    padding-top: 95px; padding-left: 15px;">

        <div class="row">
            <div class=" col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Category</h2>
                </div>
            </div>
        </div>
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Category Name:</Strong>
                        <input type="text" name="name" class="form-control" placeholder="Category Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Category Description:</Strong>
                        <input type="text" name="description" class="form-control" placeholder="Category Description">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Category image:</Strong>
                        <input type="file" name="image" class="form-control-file" placeholder="Brand image">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection