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
                            <a class="btn btn-success" href="{{route('brand.create')}}"> New brand</a>
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
                                        <th>description</th>
                                        <th>Image</th>
                                        <th>Được tạo vào lúc</th>
                                        <th>Được sửa vào lúc</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    <tr class="tr-shadow">
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>

                                        <td>{{$brand->id}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td class="desc">{{$brand->description}}</td>
                                        <td><img src="{{asset('storage/images/brands/'.$brand->logo)}}" alt=""
                                                style="height: 50px;width:100px;"></td>
                                        <td>{{$brand -> created_at}}</td>
                                        <td>{{$brand -> updated_at}}</td>
                                        <td>
                                            <span class="status--process">Processed</span>
                                        </td>
                                        <td>
                                            <form action="{{route('brand.destroy',$brand->id)}}" method="Post">
                                                <div class="table-data-feature">
                                                    <a class="item" href="{{route('brand.edit',$brand->id)}}"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are you sure');"
                                                        class=" item" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
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