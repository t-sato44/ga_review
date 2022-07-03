<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controllers\IndexController::class, 'index'])->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/review/test', function () {
    return view('review.test');
});

/* 評価ページの表示　*/
Route::resource('review', Controllers\ReviewController::class);

// 会員ログイン
Route::get('login', [Controllers\LoginController::class, 'index'])->name('login.index');
Route::post('login', [Controllers\LoginController::class, 'login'])->name('login.login');
Route::get('logout', [Controllers\LoginController::class, 'logout'])->name('login.logout');

// 会員ページ
Route::get('register', [Controllers\MemberController::class, 'create'])->name('member.create');
Route::post('register', [Controllers\MemberController::class, 'store'])->name('member.store');

// 管理画面ログイン
Route::prefix('admin')->group(function () {
    Route::get('login', [Admin\LoginController::class, 'index'])->name('admin.login.index');
    Route::post('login', [Admin\LoginController::class, 'login'])->name('admin.login.login');
    Route::get('logout', [Admin\LoginController::class, 'logout'])->name('admin.login.logout');
});

// 管理者（administratorsテーブル）未認証の場合にログインフォームに強制リダイレクトさせるミドルウェアを設定
Route::prefix('admin')->middleware('auth:administrators')->group(function () {
    Route::get('/',[Admin\IndexController::class, 'index'])->name('admin.index');
});

// メール送信テスト用
Route::get('/mail', [Controllers\MailSendController::class, 'index']);