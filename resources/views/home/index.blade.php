@extends('layouts/layout')

@section('content')

<h1>トップページ</h1>

<div class="row row-cols-1 g-5">
  <div class="col">
    <div class="card h-100">
      <div class="card-header"><h2>新着タイトル</h2></div>
      <div class="card-body">
        @foreach ($games_new as $k => $v)
        @if ($k == $games_new->keys()->last())
          <div class="card">
        @else
          <div class="card mb-2">
        @endif
            <h5 class="card-header">{{ $v->title }}</h5>
            <div class="card-body d-flex">
              <div class="eyecatch">
                <img src="http://placehold.jp/200x250.png" alt="">
              </div>
              <div class="card-text">
                <div>説明：{{ $v->description }}</div>
                <div>リリース日：{{ $v->release_date }}</div>
                <div>プレイ人数：{{ $v->players }}</div>
                <div>オフィシャルURL：{{ $v->offical_url }}</div>
                <div>運営：{{ $v->agency }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-header"><h2>注目タイトル</h2></div>
      <div class="card-body">
        @foreach ($games_attention as $k => $v)
        @if ($k == $games_attention->keys()->last())
          <div class="card">
        @else
          <div class="card mb-2">
        @endif
            <h5 class="card-header">{{ $v->title }}</h5>
            <div class="card-body d-flex">
              <div class="eyecatch">
                <img src="http://placehold.jp/200x250.png" alt="">
              </div>
              <div class="card-text">
                <div>説明：{{ $v->description }}</div>
                <div>リリース日：{{ $v->release_date }}</div>
                <div>プレイ人数：{{ $v->players }}</div>
                <div>オフィシャルURL：{{ $v->offical_url }}</div>
                <div>運営：{{ $v->agency }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-header"><h2>おすすめタイトル</h2></div>
      <div class="card-body">
        @foreach ($games_recommend as $k => $v)
        @if ($k == $games_recommend->keys()->last())
          <div class="card">
        @else
          <div class="card mb-2">
        @endif
            <h5 class="card-header">{{ $v->title }}</h5>
            <div class="card-body d-flex">
              <div class="eyecatch">
                <img src="http://placehold.jp/200x250.png" alt="">
              </div>
              <div class="card-text">
                <div>説明：{{ $v->description }}</div>
                <div>リリース日：{{ $v->release_date }}</div>
                <div>プレイ人数：{{ $v->players }}</div>
                <div>オフィシャルURL：{{ $v->offical_url }}</div>
                <div>運営：{{ $v->agency }}</div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection