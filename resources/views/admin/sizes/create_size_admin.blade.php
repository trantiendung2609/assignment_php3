@extends('admin.app_admin')
@section('content')
<div class="page-container">
    <div style="
    padding-top: 95px; padding-left: 15px;">

        <div class="row">
            <div class=" col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Size</h2>
                </div>
            </div>
        </div>
        <form action="{{route('size.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Số size:</Strong>
                        <input type="text" name="name" class="form-control" placeholder="Số size">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Chọn sản phẩm:</Strong>
                        <select class="form-control" name="product_id" id="">
                            <option selected>Chọn sản phẩm</option>
                            @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        @error('product_id')
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