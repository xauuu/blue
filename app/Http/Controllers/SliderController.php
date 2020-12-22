<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    // slider
    public function add_slider()
    {
        return  view('admin.slider.add-slider');
    }
    public function save_slider(Request $request)
    {
        $slider = new Slider();
        $slider->slider_name = $request->slider_name;
        $slider->slider_title = $request->slider_title;
        $slider->slider_discount = $request->slider_discount;
        $slider->slider_content = $request->slider_content;

        $file = $request->slider_img;
        $name = vn_to_str($request->slider_title);
        $img_name = $name . '-' . date('mdYHis') . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/slider', $img_name);
        $slider->slider_img = $img_name;

        $slider->save();
        return Redirect::back();
    }
    public function all_slider()
    {
        $slider = Slider::all();
        return view('admin.slider.all-slider', compact('slider'));
    }
    public function delete_slider($slider_id)
    {
        $slider = Slider::find($slider_id);
        $slider->delete();
        return redirect()->back()->with('success', "Đã xoá slider");
    }
    public function edit_slider($slider_id)
    {
        $slider = Slider::find($slider_id);
        return view('admin.slider.edit-slider', compact('slider'));
    }
    public function update_slider(Request $request)
    {
        $slider = Slider::find($request->slider_id);
        $img = $slider->slider_img;
        $slider->slider_name = $request->slider_name;
        $slider->slider_title = $request->slider_title;
        $slider->slider_discount = $request->slider_discount;
        $slider->slider_content = $request->slider_content;
        if ($request->hasFile('slider_img')) {
            $file = $request->slider_img;
            $name = vn_to_str($request->slider_title);
            $img_name = $name . '-' . date('mdYHis') . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/slider', $img_name);
            $slider->slider_img = $img_name;

            $image_path = public_path("uploads/slider/" . $img);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $slider->save();
        return Redirect::to('/admin/slider/all-slider')->with('success', "Đã cập nhật slider");
    }
    // faq
    public function add_faq()
    {
        return  view('admin.faq.add-faq');
    }
    public function save_faq(Request $request)
    {
        $faq = new Faq();
        $faq->faq_question = $request->faq_question;
        $faq->faq_answer = $request->faq_answer;

        $faq->save();
        return Redirect::to('admin/faq/all-faq')->with('success', 'Đã thêm câu hỏi mới');
    }
    public function all_faq()
    {
        $faq = Faq::all();
        return view('admin.faq.all-faq', compact('faq'));
    }
    public function delete_faq($faq_id)
    {
        $faq = Faq::find($faq_id);
        $faq->delete();
        return redirect()->back()->with('success', "Đã xoá câu hỏi");
    }
    public function edit_faq($faq_id)
    {
        $faq = Faq::find($faq_id);
        return view('admin.faq.edit-faq', compact('faq'));
    }
    public function update_faq(Request $request)
    {
        $faq = Faq::find($request->faq_id);
        $faq->faq_question = $request->faq_question;
        $faq->faq_answer = $request->faq_answer;
        $faq->save();
        return Redirect::to('/admin/faq/all-faq')->with('success', "Đã cập nhật câu hỏi");
    }
}
