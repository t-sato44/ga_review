<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Device;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class GameController extends Controller
{
	public function __construct(Game $game, Genre $genre, Device $device)
	{
		$this->game    = $game;
		$this->genre   = $genre;
    $this->device  = $device;
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
      $img = $request->file('image_path');
      if (isset($img)) {
        $path = $img->store('img','public');
        if ($path) {
          Image::create([
            'game_id' => $game->id,
            'image_path' => $path,
          ]);
        }
      }
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
      $score = count($reviews) > 0 ? Helper::score_avg($reviews) : 0;
      $chart = count($reviews) > 0 ? Helper::chart_avg($reviews) : [];
      $images = $game->image;
      return view('game.show', compact(
        'game',
        'devices',
        'genres',
        'reviews',
        'score',
        'chart',
        'images'
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
      $game       = $this->game->find($id);
      $devices    = $game->devices;
      $device_all = $this->device->get();
      $genres     = $game->genres;
      $genre_all  = $this->genre->get();
      $reviews    = $game->reviews;
      $score      = count($reviews) > 0 ? Helper::score_avg($reviews) : 0;
      $chart      = count($reviews) > 0 ? Helper::chart_avg($reviews) : [];
      $images     = $game->image;
      return view('game.edit', compact(
        'game',
        'devices',
        'device_all',
        'genres',
        'genre_all',
        'reviews',
        'score',
        'chart',
        'images'
      ));
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
      $validated = $request->validate([
        'title' => 'required|unique:games|max:255',
        'description' => 'max:16384',
      ]);
      $game = $this->game::find($id);
      // dd($game);
      $game->title = $request->title;
      $game->description = $request->description;
      $game->save();
      return redirect()->route('game.show', $id)->with('status', '編集完了');
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
