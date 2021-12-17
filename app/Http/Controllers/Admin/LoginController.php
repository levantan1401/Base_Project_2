<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function login()
  {
    return view('layout.index');
  }
  // kiểm tra đăng nhập
  public function authenticate(Request $request)
  {
    $request->validate([
      'email' => 'required|string|email',
      'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      return redirect()->intended('admin');
    }

    return redirect('login')->with('error', 'Mật Khẩu hoặc Email sai vui lòng nhật lại!!!');
  }

  public function logout()
  {
    Auth::logout();

    return redirect('login');
  }

  public function addaccount()
  {
    User::create([
      'name'=> 'Demo Customer',
      'email'=> 'levantan.laptrinh@gmail.com',
      'password'=> bcrypt(123456)
    ]);
  }
}
