@extends('admin.app_admin')
@section('content')
<div class="page-container">
    <div style="
    padding-top: 95px; padding-left: 15px;">

        <div class="row">
            <div class=" col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Brand</h2>
                </div>
            </div>
        </div>
        <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Brand Name:</Strong>
                        <input type="text" name="name" class="form-control" placeholder="Brand Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Brand Description:</Strong>
                        <input type="text" name="description" class="form-control" placeholder="Brand Description">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Brand Logo:</Strong>
                        <input type="file" name="logo" class="form-control-file" placeholder="Brand logo">
                        @error('logo')
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