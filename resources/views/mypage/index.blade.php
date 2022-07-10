@extends('layouts/layout')

@section('content')

	<h1 class="h5">マイページ</h1>

	<x-form-layout>

		<div class="card mb-3">
			<div class="card-header">自己紹介</div>
			<div class="card-body">
				<p class="card-text">{{ $mypage->self_info }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">名前</div>
			<div class="card-body">
				<p class="card-text">{{ $user->name }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">フリガナ</div>
			<div class="card-body">
				<p class="card-text">{{ $user->name_kana }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">性別</div>
			<div class="card-body">
				<p class="card-text">{{ $sex }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">生年月日</div>
			<div class="card-body">
				<p class="card-text">{{ $user->birth_date }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">所在地</div>
			<div class="card-body">
				<p class="card-text">{{ $area }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">電話番号</div>
			<div class="card-body">
				<p class="card-text">{{ $mypage->tel }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">ログインID</div>
			<div class="card-body">
				<p class="card-text">{{ $user->email }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">クチコミネーム</div>
			<div class="card-body">
				<p class="card-text">{{ $user->nickname }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">ゲームレベル</div>
			<div class="card-body">
				<p class="card-text">{{ $user->level }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">Twitter設定</div>
			<div class="card-body">
				<p class="card-text">{{ $twitter }}</p>
			</div>
		</div>

		<div class="card mb-3">
			<div class="card-header">好きなゲームジャンル</div>
			<div class="card-body">
				<ul class="list-unstyled">
					@foreach ($genres as $genre)
						<li>{{ $genre }}</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="text-center">
			<a href="{{ route('mypage.edit') }}" class="btn btn-primary">編集する</a>
		</div>

	</x-form-layout>

@endsection