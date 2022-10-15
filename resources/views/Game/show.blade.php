@extends('layouts/layout')

@section('content')

<h1 class="text-primary">{{ $game->title }}</h1>
<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#info">商品情報</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#voice">口コミ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#image">投稿写真・動画</a>
    </li>
  </ul>

  <div class="tab-content">

    <div id="info" class="tab-pane active">
      <div class="row row-cols-1 row-cols-md-3 pt-2">
        <div class="col">
          <div class="card h-100">
            <x-rader :data="$game" />
            <div class="card-body">
              <h5 class="card-title">ゲームタイトル: {{ $game->title }}</h5>
              <p class="card-date">リリース日 {{ $game->release_date }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="voice" class="tab-pane">
      <h2>Voice</h2>
    </div>

    <div id="image" class="tab-pane">
      <h2>Image</h2>
    </div>
  </div>


</div>

@endsection