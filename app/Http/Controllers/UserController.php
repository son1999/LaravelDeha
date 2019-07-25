<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

//use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAdminRequest;

class UserController extends Controller
{
    public function GetloginAdmin()
    {
        return view('admin.login.index');
    }

    public function PostloginAdmin(LoginAdminRequest $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->ruler == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
            }
        } else {
            return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
        }
    }

    public function GetlogoutAdmin()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
