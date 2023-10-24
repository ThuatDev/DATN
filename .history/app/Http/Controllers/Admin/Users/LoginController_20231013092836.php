<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // Nếu đã đăng nhập, chuyển hướng đến trang admin/main hoặc trang nào đó.
            return redirect('/admin/main');
        }

        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống',
            'active' => false
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:32',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu nhiều nhất 32 ký tự',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Kiểm tra xác thực thành công

            if (auth()->user()->role === 1) {
                // Người dùng có role là 1 (hoặc quyền truy cập admin), chuyển hướng đến trang admin/main
                return redirect('/admin/main');
            }

            // Người dùng có role khác, có thể thực hiện xử lý chuyển hướng khác ở đây.

        }

        // Xử lý lỗi đăng nhập thất bại
        Session::flash('error', 'Email hoặc mật khẩu không đúng');
        return redirect()->back()->withInput();
    }
}