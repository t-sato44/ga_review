<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('login.index');
  }

  public function login(Request $request)
  {
    $credentials = $request->only(['email', 'password']);
    $guard = $request->guard;

    if (Auth::guard('members')->attempt($credentials)) {
      // ログインしたらトップページにリダイレクト
      return redirect()->route('home')->with([
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

    // ログアウトしたらログインフォームにリダイレクト
    return redirect()->route('home')->with([
      'auth' => ['ログアウトしました'],
    ]);
  }
}
