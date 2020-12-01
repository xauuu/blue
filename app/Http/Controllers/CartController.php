<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;

class CartController extends Controller
{
    public function add_cart_w_qty(Request $request)
    {
        $product = Product::find($request->product_id);
        $data = array();
        $data['id'] = $product->product_id;
        $data['qty'] = $request->quantity;
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_discount;
        $data['weight'] = '0';
        $data['options']['image'] = $product->product_img;
        Cart::add($data);

        echo Cart::content()->count();
    }
    public function add_cart_ajax(Request $request)
    {
        $product = Product::find($request->id);
        $data = array();
        $data['id'] = $product->product_id;
        $data['qty'] = '1';
        $data['name'] = $product->product_name;
        $data['price'] = $product->product_discount;
        $data['weight'] = '0';
        $data['options']['image'] = $product->product_img;
        Cart::add($data);

        echo Cart::content()->count();
    }

    public function show_cart()
    {
        $category = Category::all();
        return view('pages.cart.show-cart', compact('category'));
    }
    public function delete_item($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/cart');
    }
    public function update_cart(Request $request)
    {
        foreach ($request->qty as $rowId => $qty) {
            Cart::update($rowId, $qty);
        }
        return Redirect::to('/cart');
    }
    public function check_coupon(Request $request)
    {
        $coupon = Coupon::where('coupon_code', $request->coupon_code)->where('coupon_times', '>', 0)->first();
        if ($coupon) {
            if ($coupon->count() > 0) {
                if (Session::get('coupon')) {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_feature' => $coupon->coupon_feature,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_feature' => $coupon->coupon_feature,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                $coupon->coupon_times = $coupon->coupon_times - 1;
                $coupon->save();
                return redirect()->back()->with('success', 'Sử dụng mã giảm giá thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Không tồn tại mã giảm giá');
        }
    }
}
