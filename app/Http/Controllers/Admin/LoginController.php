<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('admin.login.index');
  }

  public function login(Request $request)
  {
    $credentials = $request->only(['email', 'password']);

    if (Auth::guard('administrators')->attempt($credentials)) {
      return redirect()->route('admin.index')->with([
        'login_msg' => 'ログインしました。',
      ]);
    }

    return back()->withErrors([
      'login' => ['ログインに失敗しました'],
    ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('admin.login.index')->with([
      'logout_msg' => 'ログアウトしました',
    ]);
  }
}
