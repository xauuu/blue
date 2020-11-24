<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\CategoryPost;

class CategoryPostController extends Controller
{
    public function add_category_post()
    {
        return view('admin.post.add-category-post');
    }
    public function all_category_post()
    {
        $cate_post = CategoryPost::all();
        return view('admin.post.all-category-post', compact('cate_post'));
    }
    public function save_category_post(Request $request)
    {
        $cate_post = new CategoryPost();
        $cate_post->category_post_name = $request->category_post_name;
        $cate_post->category_post_slug = vn_to_str($request->category_post_name);
        $cate_post->category_post_desc = $request->category_post_desc;
        $cate_post->category_post_status = $request->category_post_status;
        $cate_post->save();
        Session::flash('success', 'Bạn đã thêm danh mục bài viết ' . $request->category_post_name);
        return Redirect::to('/admin/post/all-category-post');
    }
    public function edit_category_post($category_post_id)
    {
        $cate_post = CategoryPost::find($category_post_id);
        return view('admin.post.edit-category-post', compact('cate_post'));
    }
    public function update_category_post(Request $request)
    {
        $cate_post = CategoryPost::find($request->category_post_id);
        $cate_post->category_post_name = $request->category_post_name;
        $cate_post->category_post_slug = vn_to_str($request->category_post_name);
        $cate_post->category_post_desc = $request->category_post_desc;
        $cate_post->save();
        Session::flash('success', 'Bạn đã cập nhât danh mục bài viết ' . $request->category_post_name);
        return Redirect::to('/admin/post/all-category-post');
    }
    public function delete_category_post($category_post_id)
    {
        $cate_post = CategoryPost::find($category_post_id);
        $cate_post->delete();
        Session::flash('success', 'Bạn đã xoá danh mục bài viết ' . $cate_post->category_post_name);
        return Redirect::to('/admin/post/all-category-post');
    }
    public function status_category_post($category_post_id)
    {
        $cate_post = CategoryPost::find($category_post_id);
        if($cate_post->category_post_status == 0){
            $cate_post->category_post_status = 1;
            $cate_post->save();
            Session::flash('success', 'Bạn đã hiển thị danh mục bài viết ' . $cate_post->category_post_name);
        }else{
            $cate_post->category_post_status = 0;
            $cate_post->save();
            Session::flash('success', 'Bạn đã ẩn danh mục bài viết ' . $cate_post->category_post_name);
        }
        return Redirect::to('/admin/post/all-category-post');
    }
}
