@extends('admin.app_admin')
@section('content')
    <div class="page-container">
        <div style="
    padding-top: 95px; padding-left: 15px;">

            <div class="row">
                <div class=" col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add Coupon</h2>
                    </div>
                </div>
            </div>
            <form action="{{ URL::to('admin/insert-coupon-code') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Tên mã giảm giá:</Strong>
                            <input type="text" name="coupon_name" class="form-control" placeholder="Coupon name">
                            @error('coupon_name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Mã giảm giá:</Strong>
                            <input type="text" name="coupon_code" class="form-control" placeholder="Coupon Code">
                            @error('coupon_code')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Số lượng mã giảm giá:</Strong>
                            <input type="text" name="coupon_times" class="form-control" placeholder="Coupon times">
                            @error('coupon_times')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Tính năng mã:</Strong>
                            <select name="coupon_condition" id="">
                                <option value="0">Chọn tính năng mã</option>
                                <option value="1">Giảm theo phần trăm</option>
                                <option value="2">Giảm theo tiền</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <Strong>Nhập số % hoặc tiền:</Strong>
                            <input type="text" name="coupon_number" class="form-control" placeholder="Coupon Number">
                            @error('coupon_number')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" name="add_coupon" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
