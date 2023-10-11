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
        $remember = $request->has('remember') ? true : false;
        // dd ($remember);
        dd ($request->all());
        $request->validate(
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
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password]
        , $remember)) {
            // đăng nhập thành công
            return redirect('/admin/main');
        } else {
            // đăng nhập thất bại
            return redirect('/admin/users/login')->with('error', 'Email hoặc mật khẩu không đúng');
        }
        // echo 'LoginController';

    }
}
