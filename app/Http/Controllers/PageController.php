<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact()
    {
        $category = Category::all();
        $contact = Contact::first();
        return view('pages.contact', compact('category', 'contact'));
    }
    public function faq()
    {
        $category = Category::all();
        return view('pages.faq', compact('category'));
    }
}
