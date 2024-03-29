<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
	public function __construct(Review $review, Game $game, Device $device)
	{
		$this->review = $review;
		$this->game = $game;
    $this->device  = $device;
	}

	// Reviewページへの表示
	public function index()
	{
		if(Gate::allows('admin')){
			// 管理者だけ処理を実行します
		}
		if(Gate::denies('read')){
			// 閲覧者を除いて処理を実行します
		}
		$reviews = Review::all();
		return view('review.index', compact('reviews'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$device_all = $this->device->get();
		$games      = $this->game->all();
		$playtimes  = config('playtime');
		// dd($games);
		return view('review.create', compact('device_all', 'games', 'playtimes'));
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
		dd($request->input('score'));
		$review          = new Review();
		$review->user_id = Auth::user()->id;
		$review->game_id = $request->input('game');
		$review->graphic = $request->input('graphic');
		$review->volume  = $request->input('volume');
		$review->sound   = $request->input('sound');
		$review->story   = $request->input('story');
		$review->comfort = $request->input('comfort');
		$review->score   = $request->input('score');
		$review->playtime= $request->input('playtime');
		$review->review  = $request->input('review');
		$review->save();
    $review->device()->attach($request->devices);
		return redirect()->route('review.show', $review->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$review = $this->review->find($id);
		$game = $this->game->find($review->game_id);
		return view('review.show', compact('review', 'game'));
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
