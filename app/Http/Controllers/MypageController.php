<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Mypage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
		$user = Auth::user();
		$mypage = $user->mypage;
		$mypage_genres = $mypage->genre;
		$mypage_genre_ids = [];
		foreach ($mypage_genres as $k => $v) {
			$mypage_genre_ids[] = $v["id"];
		}
		// dd($mypage_genre_ids);
		$prefectures = config('pref');
		$genres = Genre::all();
		return view('dashboard', compact('user', 'mypage', 'prefectures', 'genres', 'mypage_genre_ids'));
	}

	public function update(Request $request)
	{
		$request->validate([
			'self_info'   => 'nullable|max:2000',
			'name'        => 'required|max:20',
			'name_kana'   => 'required|max:20',
			'sex'         => 'required|between:1,2',
			'birth_date'  => 'nullable|date_format:Y-m-d',
			'area'        => 'nullable|between:1,47',
			'tel'         => 'nullable|numeric',
			'login_id'    => 'required|email|unique:users,email',
			'nickname'    => 'required|max:20',
			'level'       => 'required|between:1,3',
			'twitter'     => 'nullable|max:50',
			'genre'       => 'nullable|array',
		]);
		$user             = Auth::user();
		$user->name       = $request->name;
		$user->name_kana  = $request->name_kana;
		$user->birth_date = $request->birth_date;
		$user->email      = $request->login_id;
		$user->nickname   = $request->nickname;
		$user->level      = $request->level;
		$user->save();
		// dd($user);
		$mypage = Auth::user()->mypage;
		if ($mypage === null) {
			$mypage = new Mypage;
			$mypage->user_id = $user->id;
		}
		$mypage->self_info = $request->self_info;
		$mypage->sex       = $request->sex;
		$mypage->area      = $request->area;
		$mypage->tel       = $request->tel;
		$mypage->twitter   = $request->twitter;
		$mypage->save();
		$mypage->genre()->sync($request->genre);
		return redirect()->route('dashboard')->with('status', '編集完了');
	}

	public function edit($id)
	{
		$user = User::find($id);
		return view('user.edit', ['user' => $user]);
	}

}
