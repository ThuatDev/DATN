<?php

namespace App\Http\Controllers\Admin\Users;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        // echo 'LoginController';
        return view('admin.users.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
}
