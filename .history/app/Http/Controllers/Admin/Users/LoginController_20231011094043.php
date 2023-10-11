<?php

namespace App\Http\Controllers\Admin\Users;



use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;

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
    public function store(Request $request)
    {
       dd($request->all());
    }
}
