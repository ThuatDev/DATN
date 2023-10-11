<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
// use GuzzleHttp\Psr7\Request;

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
        // validation cho nó
        $this->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:32'
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được để trống',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu nhiều nhất 32 ký tự'
            ]
        );
        // echo 'LoginController';

    }
}
