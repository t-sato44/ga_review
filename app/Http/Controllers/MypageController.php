<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MypageController extends Controller
{
	public function index()
	{

		if (Gate::allows('admin')) {
			// 管理者だけ処理を実行します
		}
		if (Gate::denies('read')) {
			// 閲覧者を除いて処理を実行します
		}
		$prefectures = config('pref');
		// dd($prefectures);
		return view('dashboard', compact('prefectures'));
	}
}
