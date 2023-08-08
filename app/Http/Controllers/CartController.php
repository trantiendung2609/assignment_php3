<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;

session_start();
class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('products')->where('id', $productId)->first();
        $data = DB::table('products')->where('id', $productId)->get();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 500);   
        // $data['id'] = $product_info->id;
        // $data['qty'] = $quantity;
        // $data['name'] = $product_info->name;
        // $data['price'] = $product_info->price;
        // // // $data['gender'] = $product_info->gender;
        // // // $data['description'] = $product_info->description;
        // $data['options']['image'] = $product_info->image;


        $number = $product_info->price;
        number_format($number);
        Cart::add(array(
            'id' => $product_info->id,
            'name' => $product_info->name,
            'price' => $product_info->price,
            'image' => $product_info->image,
            'qty' => $quantity
        ));
        // Cart::destroy();
        // Cart::add($data);
        // dd($data);
        return Redirect::to('/show-cart');
    }

    public function show_cart()
    {
        return view('cart');
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_qty(Request $request)
    {
        $rowIdproduct = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowIdproduct, $qty);
        return Redirect::to('/show-cart');
    }


    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == false) {
                    $id_avai = 0;
                    if ($id_avai == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,

                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,

                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('success', 'Thêm mã giảm giá thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Thêm mã giảm giá không đúng');
        }
    }
}
