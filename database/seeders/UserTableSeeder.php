<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles = Roles::where('name', 'admin')->first();
        $manageRoles = Roles::where('name', 'manage')->first();
        $userRoles = Roles::where('name', 'user')->first();

        $admin = Admin::create([
            'email' => 'xau@admin.com',
            'password' => md5('123456'),
            'name' => 'Tran Quang Dat',
            'avatar' => 'xau.jpg'
        ]);
        $manage = Admin::create([
            'email' => 'xau@manage.com',
            'password' => md5('123456'),
            'name' => 'Tran Quang Dat',
            'avatar' => 'xau.jpg'
        ]);
        $user = Admin::create([
            'email' => 'xau@user.com',
            'password' => md5('123456'),
            'name' => 'Tran Quang Dat',
            'avatar' => 'xau.jpg'
        ]);
        $admin->roles()->attach($adminRoles);
        $manage->roles()->attach($manageRoles);
        $user->roles()->attach($userRoles);
    }
}
