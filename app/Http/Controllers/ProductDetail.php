<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Comment;

class ProductDetail extends Controller
{
    public function product_detail($product_id)
    {
        $category = Category::where('category_status', 1)->get();
        $detail = Product::find($product_id);
        $related = Product::where('category_id', $detail->category_id)->get();
        return view('pages.products.product-detail', compact('category', 'detail', 'related'));
    }
    public function add_comment(Request $request)
    {
        $all = $request->all();
        $customer_id = session('customer_id');
        $comment = new Comment();
        $date = Date('d \t\h\á\n\g m\, Y');
        $name = session('customer_name');
        $comment->product_id = $all['product_id'];
        $comment->customer_id = $customer_id;
        $comment->comment_content = $all['content'];
        $comment->comment_time = $date;
        $comment->reply_id = 0;
        $comment->save();

        $content = '
        <div class="blog__comment__item">
            <div class="blog__comment__item__pic">
                <div class="cmt-avt">' . $name[0] . '</div>
            </div>
            <div class="blog__comment__item__text">
                <h6>' . session('customer_name') . '</h6>
                <p>' . $all['content'] . '</p>
                <ul>
                    <li><i class="fa fa-clock-o"></i> ' . $date . '</li>
                    <li><i class="fa fa-share"></i> Trả lời</li>
                </ul>
            </div>
        </div>';
        echo $content;
    }
    public function reply_comment(Request $request)
    {
        $all = $request->all();
        $customer_id = session('customer_id');
        $comment = new Comment();
        $date = Date('d \t\h\á\n\g m\, Y');
        $name = session('customer_name');

        $comment->product_id = $all['product_id'];
        $comment->customer_id = $customer_id;
        $comment->comment_content = $all['content'];
        $comment->comment_time = $date;
        $comment->reply_id = $all['cmt_id'];
        $comment->save();
        $content = '
        <div class="blog__comment__item  mt-4">
            <div class="blog__comment__item__pic">
                <div class="reply-avt">' . $name[0] . '</div>
            </div>
            <div class="blog__comment__item__text">
                <h6>' . session('customer_name') . '</h6>
                <p>' . $all['content'] . '</p>
                <ul>
                    <li><i class="fa fa-clock-o"></i> ' . $date . '</li>
                </ul>
            </div>
        </div>';
        echo $content;
    }
}
