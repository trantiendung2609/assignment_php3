@extends('app')
@section('content_home')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <?php
                $content = Cart::content();
                // echo '<pre>';
                // print_r($content);
                
                // echo '</pre>';
                ?>
                <div class="col-md-12">
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $value)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('storage/images/products/' . $value->image) }}"
                                                alt="" style="height: 50px;width:100px;">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $value->name }}</h2>
                                        </td>
                                        <td>{{ number_format($value->price) . '' . 'VNĐ' }} </td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">

                                                <form action="{{ URL::to('/update-cart-qty') }}" method="post"
                                                    style="display: flex">
                                                    {{ csrf_field() }}

                                                    <input type="text" name="cart_quantity"
                                                        class="form-control text-center" value="{{ $value->qty }}">
                                                    <input type="submit" value="+" name="update_qty"
                                                        class="btn btn-primary btn-sm">
                                                    <input type="hidden" value="{{ $value->rowId }}" name="rowId_cart">


                                                </form>
                                            </div>

                                        </td>
                                        <td>
                                            <?php
                                            $subtotal = $value->price * $value->qty;
                                            echo number_format($subtotal) . '' . 'VNĐ';
                                            ?>
                                        </td>
                                        <td><a href="{{ URL::to('/delete-to-cart/' . $value->rowId) }}"
                                                class="btn btn-primary btn-sm">X</a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row" style="margin: 10px 0px 0px 0px">
                    <div class="col-md-6">
                        <div class="row mb-5">

                            <div class="col-md-6">
                                <button class="btn btn-primary btn-sm btn-block"><a href="/shop"
                                        style="color: white;">Continue
                                        Shopping</a></button>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form class="row" action="{{ URL::to('/check-coupon') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <label class="text-black h4" for="coupon">Coupon</label>
                                <p>Enter your coupon code if you have one.</p>
                            </div>
                            <div class="col-md-8 mb-3 mb-md-0">
                                <input type="text" name="coupon" class="form-control py-3" id="coupon"
                                    placeholder="Coupon Code">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" name="check-coupon" class="btn btn-primary btn-sm"
                                    value="Tính mã giảm giá">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Tổng tiền: </span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong
                                            class="text-black">{{ number_format(Cart::subtotal()) . '' . 'VNĐ' }}</strong>

                                    </div>
                                    {{-- <div class="col-md-6">
                                        <span class="text-black">Mã giảm: </span>
                                    </div> --}}
                                    <div class="col-md-6">
                                        @if (Session::get('coupon'))
                                            @foreach (Session::get('coupon') as $key => $cou)
                                                @if ($cou['coupon_condition'] == 1)
                                                    Mã giảm : {{ $cou['coupon_number'] }} %
                                                    <p>
                                                        @php
                                                            $total_coupon = (Cart::subtotal() * $cou['coupon_number']) / 100;
                                                            echo '<p>Tổng giảm:' . number_format($total_coupon, 0, ',' . 'đ</p>');
                                                        @endphp
                                                    </p>
                                                    <p>Tổng
                                                        tiền đã giảm:
                                                        {{ number_format(Cart::subtotal() - $total_coupon, 0, ',', '.') }}đ
                                                    </p>
                                                @elseif ($cou['coupon_condition'] == 2)
                                                    Mã giảm : {{ number_format($cou['coupon_number'], 0, ',', '.') }} k
                                                    <p>
                                                        @php
                                                            $total_coupon = Cart::subtotal() - $cou['coupon_number'];
                                                            // echo '<p>Tổng giảm:' . number_format($total_coupon, 0, ',', '.' . 'đ</p>');
                                                        @endphp
                                                    </p>
                                                    <p>
                                                        Tổng
                                                        tiền đã giảm:
                                                        {{ number_format(Cart::subtotal() - $total_coupon, 0, ',', '.') }}đ
                                                    </p>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                                @if (!Auth::user() != null && $shipping_id == null)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ URL::to('/login') }}"
                                                class="btn btn-primary btn-lg py-3 btn-block">Thanh Toán</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="{{ URL::to('/checkout') }}"
                                                class="btn btn-primary btn-lg py-3 btn-block">Thanh Toán</a>
                                        </div>
                                    </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
