@extends('layouts/layout')

@section('content')

<h1 class="h5">タイトル情報登録</h1>

<form action="{{ route('game.store') }}" method="POST">
	@csrf

		<div class="card mb-4">
			<div class="card-header">タイトル</div>
			<div class="card-body">
				<textarea name="title" rows="1" class="form-control">{{old('game')}}</textarea>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">内容説明</div>
			<div class="card-body">
				<textarea name="review" rows="10" class="form-control">{{old('review')}}</textarea>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">プレイ機器</div>
			<div class="card-body">
				@php
					$items = [
						[
							'id' => 1,
							'name' => 'Nintendo Switch'
						],
						[
							'id' => 2,
							'name' => 'PlayStation4'
						],
						[
							'id' => 3,
							'name' => 'PlayStation5'
						],
						[
							'id' => 4,
							'name' => 'PC'
						],
					];
				@endphp
				@foreach ($items as $item)
					<div class="form-check">
						<input class="form-check-input" name="devices" type="checkbox" value="{{ $item['id'] }}" id="defaultCheck{{ $item['id']}}">
						<label class="form-check-label" for="defaultCheck{{ $item['id']}}">
							{{ $item['name'] }}
						</label>
					</div>
				@endforeach
			</div>
		</div>
		
		<div class="card mb-4">
			<div class="card-header">発売日</div>
			<div class="card-body">
				<input id="release_date" class="form-control" type="date" name="release_date" :value="old('release_date')" required>
			</div>
		</div>
        
		<div class="card mb-4">
			<div class="card-header">ジャンル</div>
			<div class="card-body">
				<textarea name="genre" rows="1" class="form-control">{{old('game')}}</textarea>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">プレイ人数</div>
			<div class="card-body">
				<textarea name="players" rows="1" class="form-control">{{old('game')}}</textarea>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">公式サイト</div>
			<div class="card-body">
				<textarea name="offical_url" rows="1" class="form-control">{{old('game')}}</textarea>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">発売元</div>
			<div class="card-body">
				<textarea name="agency" rows="1" class="form-control">{{old('game')}}</textarea>
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">TOP表示</div>
			<div class="card-body">
				@php
					$items = [
						[
							'id' => 1,
							'name' => '新着タイトル'
						],
						[
							'id' => 2,
							'name' => '注目タイトル'
						],
						[
							'id' => 3,
							'name' => 'オススメタイトル'
						],
					];
				@endphp
				@foreach ($items as $item)
					<div class="form-check">
						<input class="form-check-input" name="devices" type="checkbox" value="{{ $item['id'] }}" id="defaultCheck{{ $item['id']}}">
						<label class="form-check-label" for="defaultCheck{{ $item['id']}}">
							{{ $item['name'] }}
						</label>
					</div>
				@endforeach
			</div>
		</div>

		<div class="text-center">
			<button type="submit" class="btn btn-primary">送信</button>
		</div>
	</form>

@endsection