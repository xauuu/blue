<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Faq;
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
        $contact = Contact::first();
        $faq = Faq::all();
        return view('pages.faq', compact('category', 'contact', 'faq'));
    }
}
