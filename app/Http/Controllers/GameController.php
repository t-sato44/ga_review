<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
	public function __construct(Game $game)
	{
		$this->game = $game;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$games = Game::all();
		return view('game.index', compact('games'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	//タイトル情報で入力されたデータを保存
     public function store(Request $request)
    {
		$game               = new Game();
//		$review->user_id = Auth::user()->id;
//		$review->game_id = 1;
		$game->title        = $request->input('title');
		$game->release_date = $request->input('release_date');
		$game->genre        = $request->input('genre');
		$game->players      = $request->input('players');
		$game->offical_url  = $request->input('offical_url');
		$game->agency       = $request->input('agency');
		$game->is_new       = 1;
		$game->is_attention = 1;
		$game->is_recommend = 1;
		$game->save();
		return redirect()->route('game.show', $game->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = $this->game->find($id);
        // dd($game);
		return view('game.show', compact('game'));
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
