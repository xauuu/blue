<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\json_encode;

class AdminController extends Controller
{

    public function index()
    {
        AuthLogin();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $statistic = Statistic::where('order_date', $now)->first();
        return view('admin.admin-home', compact('statistic'));
    }
    public function statistic()
    {
        AuthLogin();
        return view('admin.statistic.statistic');
    }
    public function user()
    {
        AuthLogin();
        $user = Customer::all();
        return view('admin.user.show-user', compact('user'));
    }
    public function delete_user($user_id)
    {
        $user = Customer::find($user_id);
        $user->delete();
        return redirect()->back()->with('success', 'Bạn đã xoá tài khoản: '.$user->customer_email);
    }
    public function lock_user($user_id)
    {
        $user = Customer::find($user_id);
        if($user->customer_status == 0){
            $user->customer_status = 1;
            $user->save();
            return redirect()->back()->with('success', 'Bạn đã khoá tài khoản: '.$user->customer_email);
        }else{
            $user->customer_status = 0;
            $user->save();
            return redirect()->back()->with('success', 'Bạn đã mở khoá tài khoản: '.$user->customer_email);
        }
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
    public function load_statistic(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $statistic = Statistic::whereBetween('order_date', [$start, $end])
            ->orderBy('order_date', 'asc')->get();

        foreach ($statistic as $item) {
            $chart[] = array(
                'order_date' => $item->order_date,
                'profit' => $item->sales,
                'order' => $item->total_order
            );
        }
        echo json_encode($chart);
    }
    public function load_chart()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $last_day = $now->toDateString();
        $last_7_day = $now->subDays(7)->toDateString();
        $statistic = Statistic::whereBetween('order_date', [$last_7_day, $last_day])
            ->orderBy('order_date', 'asc')->get();

        foreach ($statistic as $item) {
            $chart[] = array(
                'order_date' => $item->order_date,
                'profit' => $item->sales,
                'order' => $item->total_order
            );
        }
        echo json_encode($chart);
    }
}
