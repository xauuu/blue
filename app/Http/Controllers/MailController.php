<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Cart;

class MailController extends Controller
{
    public function send_mail()
    {
        $myEmail = 'qdatqb@gmail.com';

        // $details = [
        //     'title' => 'Mail Demo from ItSolutionStuff.com',
        //     'url' => 'https://www.itsolutionstuff.com'
        // ];
        $details = Cart::content();
        Mail::to($myEmail)->send(new SendMail($details, $myEmail));

        dd("Mail Send Successfully");
    }
}
