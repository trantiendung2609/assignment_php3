@extends('admin.app_admin')
@section('content')
<div class="page-container">
    <div style="
    padding-top: 95px; padding-left: 15px;">
        <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Product Name:</Strong>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Product Name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Gender:</Strong>
                        <input value="{{$product->gender}}" type="text" name="gender" class="form-control" placeholder="Product Name">
                        @error('gender')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Price:</Strong>
                        <input value="{{$product->price}}" type="text" name="price" class="form-control" placeholder="Product Name">
                        @error('price')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Product Description:</Strong>
                        <input value="{{$product->description}}" type="text" name="description" class="form-control" placeholder="Product Description">
                        @error('description')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Product image:</Strong>
                        <input type="file" name="image" class="form-control-file" placeholder="Product image" type="submit">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                        <strong>Ảnh cũ</strong>
                        <img src="{{asset('storage/images/products/'.$product->image)}}" alt="" style="height: 50px;width:100px;">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Thể loại sản phẩm:</Strong>
                        <select class="form-control" name="category_id" id="">
                            <option selected>Chọn thể loại</option>
                            @foreach($categories as $category)

                            <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <Strong>Thương hiệu:</Strong>
                        <select class="form-control" name="brand_id" id="">
                            <option selected>Chọn thương hiệu</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>
                                {{$brand->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('brand_id')
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