<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;

        $shipping_id = DB::table('shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return redirect('/payment');
    }

    public function payment()
    {
        return view('payment');
    }

    public function hand_cash()
    {
        return view('handcash');
    }

    public function order_place(Request $request)
    {

        // $content = Cart::content();
        // echo $content;
        // insert payment
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('payment')->insertGetId($data);

        // insert orders
        $order_data = array();
        $order_data['user_id'] = Auth::user()->id;
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insertGetId($order_data);

        // insert orders details
        $content = Cart::content();
        foreach ($content as $value) {
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $value->id;
            $order_d_data['product_name'] = $value->name;
            $order_d_data['product_price'] = $value->price;
            $order_d_data['product_sales_quantity'] = $value->qty;
            DB::table('order_details')->insert($order_d_data);
        }

        if ($data['payment_method'] == 1) {
            echo "Trả bằng thẻ";
        } elseif ($data['payment_method'] == 2) {
            Cart::destroy();
            return view('handcash');
        }
        // return redirect('/payment');
    }

    public function manage_order(Request $request)
    {
        $orders = DB::table('order')->join('users', 'order.user_id', '=', 'users.id')->select('order.*', 'users.name')->orderBy('order.id', 'desc')->get();
        return view('admin.cart.manage_order', ['orders' => $orders]);
    }

    public function view_order(Request $request, Order $order, $id)
    {
        $orders_view = DB::table('order')
            ->join('users', 'order.user_id', '=', 'users.id')
            ->join('shipping', 'order.shipping_id', '=', 'shipping.id')
            ->join('order_details', 'order.id', '=', 'order_details.order_id')
            ->select('order.*', 'users.*', 'shipping.*', 'order_details.*', 'users.name')->first();
        // print_r($orders_view);
        return view('admin.cart.view_order', ['orders_view' => $orders_view]);
    }

    public function delete_order($id)
    {
        Order::where('id', $id)->delete();
        Session::flash('success', 'Đã xóa đơn thành công' . $id);
        return redirect()->route('manage-order');
    }
    public function vnpayment(Request $request)
    {
        //         Ngân hàng: NCB
        // Số thẻ: 9704198526191432198
        // Tên chủ thẻ:NGUYEN VAN A
        // Ngày phát hành:07/15
        // Mật khẩu OTP:123456
        $data = $request->all();
        $code_cart = rand(00, 9999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://assignment.test/handcash";
        $vnp_TmnCode = "0NVX0OAF"; //Mã website tại VNPAY 
        $vnp_HashSecret = "DBPYGVYKUPZOALBMBDOFRSFRUVKYDCHD"; //Chuỗi bí mật
        $vnp_TxnRef = $code_cart; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        // $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {

            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        // header('Location: ' . $vnp_Url);
        //     die();

        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }

    public function insert_vnpay()
    {
        if (isset($_GET['vnp_Amount'])) {
            $data_vnpay = [
                'vnp_Amount' => $_GET['vnp_Amount'],
                'vnp_BankCode' => $_GET['vnp_BankCode'],
                'vnp_BankTranNo' => $_GET['vnp_BankTranNo'],
                'vnp_CardType' => $_GET['vnp_CardType'],
                'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
                'vnp_PayDate' => $_GET['vnp_PayDate'],
                'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
                'vnp_TmnCode' => $_GET['vnp_TmnCode'],
                'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
                'vnp_TransactionStatus' => $_GET['vnp_TransactionStatus'],
                'vnp_TxnRef' => $_GET['vnp_TxnRef'],
                'vnp_SecureHash' => $_GET['vnp_SecureHash'],
            ];
        }
    }
}
