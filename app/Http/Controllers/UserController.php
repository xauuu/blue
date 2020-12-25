<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $admin = Admin::with('roles')->orderBy('admin_id', 'DESC')->get();
        return view('admin.user.all-user')->with(compact('admin'));
    }
    public function assign_roles(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
        $user->roles()->detach();
        if($request['admin_role']){
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        if($request['manage_role']){
            $user->roles()->attach(Roles::where('name', 'manage')->first());
        }
        if($request['user_role']){
            $user->roles()->attach(Roles::where('name', 'user')->first());
        }
        return redirect()->back()->with('success', 'Đã phân quyền');
    }
}
