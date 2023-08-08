<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CouponController extends Controller
{
    public function insert_coupon(Request $request)
    {
        return view('admin.coupon.admin_create_coupon');
    }

    public function list_coupon(Request $request)
    {
        // ->orderby('id')
        $coupons = Coupon::orderby('id', 'DESC')->get();
        return view('admin.coupon.admin_list_coupon', ['coupons' => $coupons]);
    }
    public function insert_coupon_code(Request $request)
    {
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_times = $data['coupon_times'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->save();
        return  Redirect::to('admin/list-coupon')->with('success', 'Đã thêm thành công');
    }

    public function delete_coupon($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return Redirect::to('admin/list-coupon')->with('success', 'Đã xóa thành công');
    }
}
