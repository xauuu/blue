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
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function home()
    {
        $category = Category::all();
        $product_latest = Product::latest()->limit(8)->get();
        return view('pages.home', compact('category', 'product_latest'));
    }
    public function shop()
    {
        $cook = Cookie::get('page');
        $page = isset($cook) ? $cook : 6;
        $category = Category::where('category_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == 'tang_dan') {
                $product = Product::where('product_status', 1)
                    ->orderBy('product_discount', "ASC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'giam_dan') {
                $product = Product::where('product_status', 1)
                    ->orderBy('product_discount', "DESC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'a_z') {
                $product = Product::where('product_status', 1)
                    ->orderBy('product_name', "ASC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'z_a') {
                $product = Product::where('product_status', 1)
                    ->orderBy('product_name', "DESC")
                    ->paginate($page)->appends(request()->query());
            }
        } elseif (isset($_GET['min']) && isset($_GET['max'])) {
            $min = $_GET['min'] * 1000;
            $max = $_GET['max'] * 1000;

            $product = Product::where('product_status', 1)
                ->whereBetween('product_discount', [$min, $max])
                ->paginate($page)->appends(request()->query());
        } else {
            $product = Product::where('product_status', 1)->paginate($page);
        }
        return view('pages.categories.show-product', compact('product', 'category', 'brand'));
    }
    public function category($category_slug)
    {
        $category = Category::where('category_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();

        $cook = Cookie::get('page');
        $page = isset($cook) ? $cook : 6;

        $cate_slug = Category::where('category_slug', $category_slug)->first();
        $category_id = $cate_slug->category_id;

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == 'tang_dan') {
                $product = Product::join('categories', 'categories.category_id', 'products.category_id')
                    ->where(function ($query) use ($category_id) {
                        return $query->where('products.category_id', $category_id)
                            ->orWhere('category_parent', $category_id);
                    })->where('product_quantity', '>', 0)
                    ->orderBy('product_discount', "ASC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'giam_dan') {
                $product = Product::join('categories', 'categories.category_id', 'products.category_id')
                    ->where(function ($query) use ($category_id) {
                        return $query->where('products.category_id', $category_id)
                            ->orWhere('category_parent', $category_id);
                    })->where('product_quantity', '>', 0)
                    ->orderBy('product_discount', "DESC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'a_z') {
                $product = Product::join('categories', 'categories.category_id', 'products.category_id')
                    ->where(function ($query) use ($category_id) {
                        return $query->where('products.category_id', $category_id)
                            ->orWhere('category_parent', $category_id);
                    })->where('product_quantity', '>', 0)
                    ->orderBy('product_name', "ASC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'z_a') {
                $product = Product::join('categories', 'categories.category_id', 'products.category_id')
                    ->where(function ($query) use ($category_id) {
                        return $query->where('products.category_id', $category_id)
                            ->orWhere('category_parent', $category_id);
                    })->where('product_quantity', '>', 0)
                    ->orderBy('product_name', "DESC")
                    ->paginate($page)->appends(request()->query());
            }
        } elseif (isset($_GET['min']) && isset($_GET['max'])) {
            $min = $_GET['min'] * 1000;
            $max = $_GET['max'] * 1000;

            $product = Product::join('categories', 'categories.category_id', 'products.category_id')
                ->where(function ($query) use ($category_id) {
                    return $query->where('products.category_id', $category_id)
                        ->orWhere('category_parent', $category_id);
                })->where('product_quantity', '>', 0)
                ->whereBetween('product_discount', [$min, $max])
                ->paginate($page)->appends(request()->query());
        } else {
            $product = Product::join('categories', 'categories.category_id', 'products.category_id')
                ->where(function ($query) use ($category_id) {
                    return $query->where('products.category_id', $category_id)
                        ->orWhere('category_parent', $category_id);
                })->where('product_quantity', '>', 0)->paginate($page);
        }

        return view('pages.categories.show-product', compact('product', 'category', 'brand'));
    }
    public function brand($brand_slug)
    {
        $cook = Cookie::get('page');
        $page = isset($cook) ? $cook : 6;

        $category = Category::where('category_status', 1)->get();
        $brand = Brand::where('brand_status', 1)->get();

        $b_slug = Brand::where('brand_slug', $brand_slug)->first();
        $brand_id = $b_slug->brand_id;

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
            if ($sort == 'tang_dan') {
                $product = Product::where('brand_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('product_discount', "ASC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'giam_dan') {
                $product = Product::where('brand_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('product_discount', "DESC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'a_z') {
                $product = Product::where('brand_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('product_name', "ASC")
                    ->paginate($page)->appends(request()->query());
            } elseif ($sort == 'z_a') {
                $product = Product::where('brand_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('product_name', "DESC")
                    ->paginate($page)->appends(request()->query());
            }
        } elseif (isset($_GET['min']) && isset($_GET['max'])) {
            $min = $_GET['min'] * 1000;
            $max = $_GET['max'] * 1000;

            $product = Product::where('brand_id', $brand_id)
                ->where('product_status', 1)
                ->whereBetween('product_discount', [$min, $max])
                ->paginate($page)->appends(request()->query());
        } else {
            $product = Product::where('brand_id', $brand_id)
                ->where('product_status', 1)
                ->paginate($page);
        }

        return view('pages.categories.show-product', compact('product', 'category', 'brand'));
    }
    public function login()
    {
        if (Session::get('backUrl') != url()->previous()) {
            Session::put('backUrl', url()->previous());
        }
        return view('pages.login');
    }
    public function logout()
    {
        Session::put('customer_id', null);
        Session::put('customer_name', null);
        session()->forget('coupon');
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
            if (strpos(session('backUrl'), "registration")) {
                return Redirect::to('/home');
            }
            return Redirect::to(session('backUrl'));
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
        $search = Product::where('product_name', 'like', "%{$request->search}%")->get();
        $output = '<ul class="dropdown-menu search">';
        if (count($search)) {
            foreach ($search as $item) {
                $output .= '
                    <li>
                        <a class="dropdown-item" href="' . url('/product-detail/' . $item->product_slug) . '">' . $item->product_name . '
                        <span class="search-price">' . number_format($item->product_discount) . ' VND</span>
                        </a>
                    </li>';
            }
        } else {
            $output .= '<li>Không có kết quả</li>';
        }

        $output .= '</ul>';
        echo $output;
    }
    public function paginate(Request $request)
    {
        $page = $request->page;
        Cookie::queue('page', $page, 3600);
    }
}
