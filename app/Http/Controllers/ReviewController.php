<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	// Reviewページへの表示
	public function index()
	{
		// この２つの$reviewsと$reviews2はほぼ同じことを行っている
		$reviews = Review::all();
		$reviews2 = DB::table('reviews')->get();
		// dd($reviews2);
		return view('review.index', compact('reviews', 'reviews2'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	//レビューページで入力されたデータを保存
	public function store(Request $request)
	{
		$review = new Review();
		$review->review = $request->input('review');
		$review->score = $request->input('score');
		$review->graphic = $request->input('graphic');
		$review->volume = $request->input('volume');
		$review->sound = $request->input('sound');
		$review->story = $request->input('story');
		$review->comfort = $request->input('comfort');
		//    $review->game_id = $request->input('game');
		$review->game_id = $request->input('1');
		$review->user_id = Auth::user()->id;
		$review->save();
		//    return redirect()->route('review.show', $game);
		return redirect()->route('review.show', 1);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
