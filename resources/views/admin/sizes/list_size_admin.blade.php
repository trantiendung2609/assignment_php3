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
                            <a class="btn btn-success" href="{{route('size.create')}}"> New size</a>
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
                                        <th>name</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Được tạo vào lúc</th>
                                        <th>Được sửa vào lúc</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sizes as $size)
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>

                                        <td>{{$size->id}}</td>
                                        <td>{{$size->name}}</td>
                                        <td class="desc">{{$size->product_id}}</td>
                                        <td>{{$size -> created_at}}</td>
                                        <td>{{$size -> updated_at}}</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>
                                            <form action="{{route('size.destroy',$size->id)}}" method="Post">
                                                <div class="table-data-feature">
                                                    <a class="item" href="{{route('size.edit',$size->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are you sure');" class=" item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>

                                                </div>
                                            </form>
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
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection