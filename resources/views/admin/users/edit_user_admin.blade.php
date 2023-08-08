@extends('admin.app_admin')
@section('content')
    <div class="page-container">
        <div style="
    padding-top: 95px; padding-left: 15px;">

            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Tên user:</Strong>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                placeholder="Tên user">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Email:</Strong>
                            <input type="text" value="{{ $user->email }}" name="email" class="form-control"
                                placeholder="Email">
                            @error('email')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Password:</Strong>
                            <input type="password" value="{{ $user->password }}" name="password" class="form-control"
                                placeholder="Password">
                            @error('password')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}

                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
