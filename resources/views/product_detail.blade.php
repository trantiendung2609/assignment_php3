@extends('app')
@section('content_home')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">{{ $products->name }}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/images/products/' . $products->image) }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">

                    <h2 class="text-black">Tên: {{ $products->name }}</h2>

                    <p>Giới tính: {{ $products->gender }}</p>

                    <p class="mb-4">Mô tả: {{ $products->description }}</p>
                    <p><strong class="text-primary h4">Giá: {{ number_format($products->price) . '' . 'VNĐ' }}</strong></p>
                    <div class="mb-1">
                        <strong>Chọn size</strong>
                        <select class="form-control" name="size_id" id="">
                            <option value="">Chọn size</option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->id }}"{{ $item->id == $products->size_id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <form action="{{ URL::to('/save-cart') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="submit">&minus;</button>
                                </div>
                                <input type="number" name="qty" class="form-control text-center" value="1"
                                    placeholder="" aria-label="Example text with button addon"
                                    aria-describedby="button-addon1">
                                <input name="productid_hidden" type="hidden" value="{{ $products->id }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="submit">&plus;</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Sản phẩm cùng loại</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">

                        <div class="item">
                            <div class="block-4 text-center">
                                <figure class="block-4-image">
                                    <img src="images/cloth_1.jpg" alt="Image placeholder" class="img-fluid">
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3><a href="#">Tank Top</a></h3>
                                    <p class="mb-0">Finding perfect t-shirt</p>
                                    <p class="text-primary font-weight-bold">$50</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
