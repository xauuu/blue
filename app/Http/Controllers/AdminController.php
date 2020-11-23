<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index()
    {
        AuthLogin();
        return view('admin.admin-home');
    }
    public function login()
    {
        return view('admin-login');
    }
    public function check_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $admin = DB::table('admin')->where('email', $email)->where('password', $password)->first();
        if ($admin) {
            Session::put('admin_name', $admin->name);
            Session::put('admin_id', $admin->admin_id);
            Session::put('admin_avt', $admin->avatar);
            return Redirect::to('admin/dashboard');
        } else {
            Session::flash('error', 'Bạn nhập sai email hoặc mật khẩu');
            return Redirect::to('admin/login');
        }
    }
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        Session::put('admin_avt', null);
        return Redirect::to('admin/login');
    }
}
