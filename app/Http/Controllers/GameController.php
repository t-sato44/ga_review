<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class GameController extends Controller
{
	public function __construct(Game $game, Genre $genre)
	{
		$this->game = $game;
		$this->genre = $genre;
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
			$features = config('feature');
      $genres = $this->genre->get();
      return view('game.create', compact('features', 'genres'));
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
      $validated = $request->validate([
        'title' => 'required|unique:games|max:255',
        'description' => 'max:16384',
      ]);
      $game               = new Game();
      $game->title        = $request->input('title');
      $game->release_date = $request->input('release_date');
      $game->players      = $request->input('players');
      $game->offical_url  = $request->input('offical_url');
      $game->agency       = $request->input('agency');
      $game->is_new       = 1;
      $game->is_attention = 1;
      $game->is_recommend = 1;
      $game->save();
      $game->devices()->attach($request->devices);
      $game->genres()->attach($request->genres);
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
      $game    = $this->game->find($id);
      $devices = $game->devices;
      $genres  = $game->genres;
      $reviews = $game->reviews;
      $score = Helper::score_avg($reviews);
      $chart = Helper::chart_avg($reviews);
      return view('game.show', compact(
        'game',
        'devices',
        'genres',
        'reviews',
        'score',
        'chart'
      ));
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
