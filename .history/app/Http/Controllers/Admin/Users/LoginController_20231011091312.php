<?php

namespace App\Http\Controllers\Admin\Users;



use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        // echo 'LoginController';
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống',
            'active' => 'false'
        ]);
    }
}
