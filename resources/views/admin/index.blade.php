@extends('layouts/layout')

@section('content')

<x-heading.h1
  title="管理ページ"
  subTitle="Original Admin Page"
/>

<div class="container">
  <div class="row row-cols-1 row-cols-md-5 g-4">
    <div class="col">
      <x-link.icon
        mainTitle="承認レビュー"
        subTitle="Approval Review"
        url="{{ route('review.index') }}"
      />
    </div>
    <div class="col">
      <x-link.icon
        mainTitle="未承認レビュー"
        subTitle="UnApproval Review"
        url="{{ route('review.unapproved') }}"
      />
    </div>
    <div class="col">
      <x-link.icon
        mainTitle="ゲームタイトル登録"
        subTitle="Game Create"
        url="{{ route('game.create') }}"
      />
    </div>
  </div>
</div>

@endsection