@extends('layouts/layout')

@section('content')

<h1 class="text-primary">ゲームタイトル一覧</h1>
<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($games as $game)
      <div class="col">
        <div class="card h-100">
          {{-- <x-rader :data="$game" /> --}}
          <div class="card-body">
            <h5 class="card-title">ゲームタイトル: {{ $game->title }}</h5>
            <p class="card-date">リリース日 {{ $game->release_date }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection