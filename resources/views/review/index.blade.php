@extends('layouts/layout')

@section('content')

<h1 class="text-primary">レビュー一覧</h1>
<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($reviews as $review)
      <div class="col">
        <div class="card h-100">
          <x-rader :data="$review" />
          <div class="card-body">
            <h5 class="card-title">投稿者: {{ $review->user->nickname }}</h5>
            <p class="card-text">レビュー: {{ $review->review }}</p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection