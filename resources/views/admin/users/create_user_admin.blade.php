@extends('admin.app_admin')
@section('content')
    <div class="page-container">
        <div style="
    padding-top: 95px; padding-left: 15px;">

            <div class="row">
                <div class=" col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add User</h2>
                    </div>
                </div>
            </div>
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>User Name:</Strong>
                            <input type="text" name="name" class="form-control" placeholder="User Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Email:</Strong>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Password:</Strong>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
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
