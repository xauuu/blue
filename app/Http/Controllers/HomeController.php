<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $category = Category::all();
        return view('pages.home', compact('category'));
    }
    public function shop()
    {
        $category = Category::where('category_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();
        $product = Product::where('product_status', 1)->paginate(6);
        return view('pages.categories.show-product', compact('product', 'category', 'brand'));
    }
    public function blog()
    {
        $category = Category::all();
        return view('pages.blog.blog', compact('category'));
    }
    public function blog_detail()
    {
        $category = Category::all();
        return view('pages.blog.blog-detail', compact('category'));
    }
    public function category($category_id)
    {
        $category = Category::where('category_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();

        $product = Product::join('categories', 'categories.category_id', 'products.category_id')
            // ->where('product_status', 0)->where('category_status', 0)
            ->where(function ($query) use ($category_id) {
                return $query->where('products.category_id', $category_id)
                    ->orWhere('category_parent', $category_id);
            })->where('product_quantity', '>', 0)->paginate(6);

        // $product = Product::where('product_status', 1)
        //     ->where('category_id', $category_id)->get();
        return view('pages.categories.show-product', compact('product', 'category', 'brand'));
    }
    public function brand($brand_id)
    {
        $category = Category::where('category_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();
        $product = Product::where('brand_id', $brand_id)
            ->where('product_status', 1)
            ->paginate(6);
        return view('pages.categories.show-product', compact('product', 'category', 'brand'));
    }
    public function login()
    {
        return view('pages.login');
    }
    public function logout()
    {
        Session::put('customer_id', null);
        Session::put('customer_name', null);
        return Redirect::to('/home');
    }
    public function check_login(Request $request)
    {
        $email = $request->email;
        $pass = md5($request->pass);

        $user = Customer::where('customer_email', $email)->where('customer_pass', $pass)->first();
        if ($user) {
            Session::put('customer_id', $user->id);
            Session::put('customer_name', $user->customer_name);
            return Redirect::to('/home');
        } else {
            Session::flash('error', "Bạn nhập sai email hoặc mật khẩu");
            Session::put('customer_id', null);
            Session::put('customer_name', null);
            return Redirect::to('/login-customer');
        }
    }
    public function registration()
    {
        return view('pages.registration');
    }
    public function check_registration(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $pass = md5($request->pass);

        $user = Customer::where('customer_email', $email)->first();
        if ($user) {
            Session::flash('error', "Email này đã được đăng kí");
            return Redirect::to('/registration');
        } else {
            $customer = new Customer();
            $customer->customer_email = $email;
            $customer->customer_name = $name;
            $customer->customer_pass = $pass;

            $customer->save();
            return Redirect::to('/login-customer');
        }
    }
    public function search(Request $request)
    {
        $output = '<ul class="dropdown-menu" style="display:block;">';
        $output .= '<li><a href="data">' . $request->search . '</a></li>';
        $output .= '</ul>';
        echo $output;
    }
}
