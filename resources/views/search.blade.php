@extends('app')
@section('content_home')
    @if ($search_product == [])
        <div class="col-5 mb-4">
            <span style="font-size: 20px; width: 100%">Không có sản phẩm bạn cần tìm</span>
        </div>
    @else
        <div class="site-section block-3 site-blocks-2 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 site-section-heading text-center pt-4">
                        <h2>Tìm kiếm</h2>
                        <p>Tìm thấy {{ count($search_product) }} sản phẩm</p>
                    </div>
                </div>
                <div class="row mb-5">
                    @foreach ($search_product as $product)
                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <a href="{{ URL::to('product-detail/' . $product->id) }}">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <img style="width: 347px; height: 347px;"
                                            src="{{ asset('storage/images/products/' . $product->image) }}"
                                            alt="Image placeholder" class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3>{{ $product->name }}</h3>
                                        <p class="mb-0">{{ $product->gender }}</p>
                                        <p class="text-primary font-weight-bold">{{ $product->price }} đ</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endif
@endsection
