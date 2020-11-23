<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;

class CartController extends Controller
{
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

    public function show_cart(){
        $category = Category::all();
        return view('pages.cart.show-cart', compact('category'));
    }
    public function delete_item($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/cart');
    }
}
