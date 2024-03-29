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
Route::get('/review', [Controllers\ReviewController::class, 'index'])->name('review.index');
Route::get('/review/create', [Controllers\ReviewController::class, 'create'])->name('review.create');
Route::get('/review/{id}', [Controllers\ReviewController::class, 'show'])->name('review.show');

// ゲームタイトルページ
Route::resource('game', Controllers\GameController::class);
//Route::get('/game', [Controllers\GameController::class, 'index'])->name('game.index');


// 検索ページ
Route::resource('search', Controllers\SearchController::class);

// ジェットストリーム管理画面
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
});

// 管理者グループ
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/admin', [Controllers\AdminController::class, 'index'])->name('admin');
});

// メンバーグループ
Route::group(['middleware' => ['auth', 'can:member']], function () {
    Route::get('/mypage', [Controllers\MypageController::class, 'index'])->name('mypage');
    Route::get('/mypage/edit', [Controllers\MypageController::class, 'edit'])->name('mypage.edit');
    Route::put('/mypage', [Controllers\MypageController::class, 'update'])->name('mypage.update');
    Route::post('/mypage', [Controllers\MypageController::class, 'store'])->name('mypage.store');
    Route::get('/review/edit', [Controllers\ReviewController::class, 'edit'])->name('review.edit');
    Route::get('/review/create', [Controllers\ReviewController::class, 'create'])->name('review.create');
    Route::put('/review', [Controllers\ReviewController::class, 'update'])->name('review.update');
    Route::post('/review', [Controllers\ReviewController::class, 'store'])->name('review.store');
});

// メール送信テスト用
Route::get('/mail', [Controllers\MailSendController::class, 'index']);