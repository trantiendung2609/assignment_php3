@extends('app')
@section('content_home')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <a
                        href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row" style="justify-content: center;">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Điền thông tin gửi hàng</h2>
                    <div class="p-3 p-lg-5 border">
                        <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_companyname" class="text-black"> Name </label>
                                    <input type="text" class="form-control" id="" name="shipping_name"
                                        placeholder="Tên">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="" name="shipping_phone"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_companyname" class="text-black">Email </label>
                                    <input type="text" class="form-control" id="" name="shipping_email"
                                        placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="" name="shipping_address"
                                        placeholder="Street address">
                                </div>
                            </div>

                            <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                        </form>
                    </div>
                </div>

            </div>
            <!-- </form> -->
        </div>
    </div>
@endsection
