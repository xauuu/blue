<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\City;
use App\Models\District;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Wards;
use Cart;

class CheckOutController extends Controller
{
    public function check_out()
    {
        $category = Category::all();
        $city = City::orderBy('matp', 'asc')->get();
        if (session('customer_id')) {
            return view('pages.cart.check-out', compact('category', 'city'));
        } else {
            return Redirect::to('/login-customer');
        }
    }
    public function save_checkout(Request $request)
    {
        $shipping = new Shipping();
        $all = $request->all();
        $shipping->shipping_name = $all['firstname'] . ' ' . $all['lastname'];
        $shipping->shipping_email = $all['email'];
        $shipping->shipping_phone = $all['phone'];
        $city = City::find($all['city']);
        $district = District::find($all['district']);
        $wards = Wards::find($all['wards']);
        $address = $all['address'] . ', ' . $wards->name_wards . ', ' . $district->name_district . ', ' . $city->name_city;
        $shipping->shipping_address = $address;

        $shipping->save();
        $shipping_id = $shipping->shipping_id;
        $customer_id = session('customer_id');

        $order = new Order();
        $order->customer_id = $customer_id;
        $order->shipping_id = $shipping_id;
        $order->order_total = Cart::subtotal(0, '', '');
        $order->order_payment = $request->payment;
        $order->order_status = '0';
        $order->save();
        $order_id = $order->order_id;

        $cart = Cart::content();
        foreach ($cart as $item) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $item->id;
            $order_detail->quantity = $item->qty;
            $order_detail->product_price = $item->price;
            $order_detail->save();
        }
        Cart::destroy();
        return Redirect::to('/check-out-success');
    }
    public function check_out_success()
    {
    }
    public function confirm_order()
    {
        AuthLogin();
        $all_order = Order::join('customers', 'orders.customer_id', 'customers.id')
            ->select('orders.*', 'customers.customer_name')
            ->orderby('orders.order_id', 'desc')->get();
        return view('admin.order.confirm-order', compact('all_order'));
    }
    public function detail_order($order_id)
    {
        AuthLogin();

        $detail_order = Order::findOrFail($order_id);

        return view('admin.order.detail-order', compact('detail_order'));
    }
    // public function send_mail()
    // {
    //     $to_name = 'Xau';
    //     $to_email = 'qdatqb@gmail.com';

    //     $data = array("name" => "abc", "body" => "xyz");
    //     Mail::send('mail',$data,function($message) use ($to_name,$to_email){
    //         $message->to($to_email)->subject('test mail nhé');
    //         $message->from($to_email,$to_name);
    //     });
    // }
    public function select(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'city') {
                $select = District::where('matp', $data['city_id'])->orderby('maqh', 'asc')->get();
                $output = '<option value="">Chọn quận, huyện</option>';
                foreach ($select as $item) {
                    $output .= '<option value="' . $item->maqh . '">' . $item->name_district . '</option>';
                }
            } else {
                $output = '<option value="">Chọn xã, phường</option>';
                $select = Wards::where('maqh', $data['city_id'])->orderby('xaid', 'asc')->get();
                foreach ($select as $item) {
                    $output .= '<option value="' . $item->xaid . '">' . $item->name_wards . '</option>';
                }
            }
            echo $output;
        }
    }
}
