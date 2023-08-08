@extends('app')
@section('content_home')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <a
                        href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Thanh toán giỏ
                        hàng</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php
                    $content = Cart::content();
                    // echo '<pre>';
                    // print_r($content);
                    
                    // echo '</pre>';
                    ?>
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </thead>
                                    @foreach ($content as $value)
                                        <tbody>
                                            <tr>
                                                <td>{{ $value->name }} <strong class="mx-2">x</strong>
                                                    {{ $value->qty }}</td>
                                                <td><?php
                                                $subtotal = $value->price * $value->qty;
                                                echo number_format($subtotal) . '' . 'VNĐ';
                                                ?></td>
                                            </tr>

                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                                <td class="text-black">{{ number_format(Cart::subtotal()) . '' . 'VNĐ' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                                <td class="text-black font-weight-bold">
                                                    <strong>{{ number_format(Cart::subtotal()) . '' . 'VNĐ' }}</strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                <h4>Chọn hình thức thanh toán</h4>
                                <form action="{{ URL::to('/vnpay') }}" method="POST">
                                    @csrf
                                    <div class="border p-3 mb-3">
                                        <label for="">
                                            <input type="hidden" name="total_vnpay" value="{{ $subtotal }}">
                                            <input type="submit" class="form-control" style="border: none" name="redirect"
                                                value="Thanh toán bằng vnpay">
                                            {{-- <button type="submit" style="color: gray">Thanh
                                                toán bằng
                                                vnpay</button> --}}
                                        </label>
                                    </div>
                                </form>
                                <form action="{{ URL::to('/order-place') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="border p-3 mb-3">
                                        <label for=""> <input type="radio" value="1" name="payment_option"
                                                class="">
                                            Trả bằng thẻ ATM</label>
                                    </div>

                                    <div class="border p-3 mb-3">
                                        <label for=""> <input type="radio" value="2" name="payment_option"
                                                class="">
                                            Trả bằng tiền mặt</label>
                                    </div>
                                    <input type="submit" value="Đặt hàng" name="send_order_place"
                                        class="btn btn-primary btn-lg py-3 btn-block">
                                </form>

                                {{-- <div class="form-group">
                                    <button class="btn btn-primary btn-lg py-3 btn-block"
                                        onclick="window.location='thankyou.html'">Place Order</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
@endsection
