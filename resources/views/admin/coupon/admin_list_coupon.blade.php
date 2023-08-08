@extends('admin.app_admin')
@section('content')
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <h3 class="title-5 m-b-35">data table</h3>
                            <div class="table-data__tool-right">
                                <a class="btn btn-success" href="{{ URL::to('/admin/insert-coupon') }}"> New coupon</a>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <td>STT</td>
                                            <th>Tên mã giảm giá</th>
                                            <th>Mã giảm giá</th>
                                            <th>Số lượng mã giảm giá</th>
                                            <th>Tính năng mã</th>
                                            <th>Được tạo vào lúc</th>
                                            <th>Được sửa vào lúc</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $value)
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->coupon_name }}</td>
                                                <td class="desc">{{ $value->coupon_code }}</td>
                                                <td>{{ $value->coupon_times }}</td>
                                                <td>
                                                    @if ($value->coupon_condition == 1)
                                                        <p>Giảm {{ $value->coupon_number }} %</p>
                                                    @elseif($value->coupon_condition == 2)
                                                        <p> Giảm {{ $value->coupon_number }} tiền</p>
                                                    @endif
                                                </td>
                                                <td>{{ $value->updated_at }}</td>
                                                <td>{{ $value->updated_at }}</td>
                                                <td>
                                                    <span class="status--process">Processed</span>
                                                </td>

                                                <td>
                                                    <div class="table-data-feature">
                                                        <a class="item"
                                                            onclick="return confirm('Are you sure you want to')"
                                                            href="{{ URl::to('/admin/delete-coupon/' . $value->id) }}"
                                                            data-toggle="tooltip" data-placement="top" title="Xóa">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                        href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
