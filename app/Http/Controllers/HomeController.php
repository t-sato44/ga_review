<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
	public function index()
	{
		if( Gate::allows('admin') ){
			// 管理者だけの処理になる
		}
		if( Gate::denies('read') ){
			// 閲覧者以外の処理になる
		}
		$reviews = Review::all();
		// dd($reviews);
		return view('home.index', compact('reviews'));
	}

}
