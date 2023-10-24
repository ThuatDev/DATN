<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        // dd ($request->all());
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
        // if (auth()->attempt(['email' => $request->email, 'password' => $request->password]
        // , $remember)) {
            // check email and password và role=1 (admin) mới cho vào trang admin còn remember có check hay không thì không cần
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1] , $remember)) {



            // đăng nhập thành công
    return redirect( '/admin/main');

        }
        Session::flash('error', 'Email hoặc mật khẩu không đúng');
        // khi load lại trang thì sẽ mất Session trên



        // echo 'LoginController';
        return redirect()->back()->withInput();


    }
    // check nếu đã có session thì sẽ chuyển hướng sang trang admin/main và ngược lại thì chuyển hướng sang trang admin/users/login


}
