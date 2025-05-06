<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegister()
    {
        return view('user.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'ten' => $request->name,
            'email' => $request->email,
            'matKhau' => $request->password, // Lưu mật khẩu dạng plain text
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Hãy đăng nhập.');
    }

    // Hiển thị form đăng nhập
    public function showLogin()
    {
        return view('user.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
                    ->where('matKhau', $request->password)
                    ->first();

        if ($user) {
            // Lưu thông tin vào session
            Session::put('user', $user);
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng.']);
    }

    // Đăng xuất
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }
}
