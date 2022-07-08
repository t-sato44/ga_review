<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
// トップページ
Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

// レビューページ
Route::resource('review', Controllers\ReviewController::class);

// ジェットストリーム管理画面
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [Controllers\MypageController::class, 'index'])->name('dashboard');
});

// オリジナル管理画面
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/admin', [Controllers\AdminController::class, 'index'])->name('admin');
});

// メール送信テスト用
Route::get('/mail', [Controllers\MailSendController::class, 'index']);