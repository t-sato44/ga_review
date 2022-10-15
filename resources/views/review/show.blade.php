@extends('layouts/layout')

@section('content')

<div class="container">

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#info">商品情報</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#voice">評価</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#image">投稿写真・動画</a>
    </li>
  </ul>

  <div class="tab-content">

    <div id="info" class="tab-pane active">
      <h5 class="card-title mt-2">ゲームタイトル: {{ $game->title }}</h5>
      <p class="card-date">リリース日 {{ $game->release_date }}</p>
    </div>

    <div id="voice" class="tab-pane">
      <div class="row pt-2">
        <div class="col-8">
          <div class="card h-100">
            <div class="card-body">
              <x-rader :data="$review" />
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card h-100">
            <div class="card-body">
              <div>{{ $review->review }}</div>
              <div>{{ $review->score }}</div>
              <div>{{ $review->created_at }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="image" class="tab-pane">
      <h2>Image</h2>
    </div>
  </div>


</div>

@endsection