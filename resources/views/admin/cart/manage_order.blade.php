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
                            <h3 class="title-5 m-b-35">Liệt kê đơn hàng</h3>

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
                                            <th>Tên người đặt</th>
                                            <th>Tổng giá tiền</th>
                                            <th>Tình trạng</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr class="tr-shadow">
                                                <td>
                                                    <label class="au-checkbox">
                                                        <input type="checkbox">
                                                        <span class="au-checkmark"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ number_format($order->order_total) . '' . 'VNĐ' }}</td>
                                                <td>{{ $order->order_status }}</td>
                                                {{-- <td><img src="{{ asset('storage/images/products/' . $order->image) }}"
                                                        alt="" style="height: 50px;width:100px;"></td>

                                                <td> 
                                                </td> --}}
                                                <td>
                                                    <div class="table-data-feature" style="justify-content: flex-start;">
                                                        <a class="item"
                                                            href="{{ URL::to('/admin/view-order/' . $order->id) }}">
                                                            <i class="zmdi zmdi-edit"></i></a>
                                                        {{-- <a onclick="return confirm('Are you sure')" class="item"
                                                            href="{{ URL::to('/admin/delete-order/' . ['id' => $order->id]) }}"> --}}
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
