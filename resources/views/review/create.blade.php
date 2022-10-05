@extends('layouts/layout')

@section('content')

	<h1 class="h5">クチコミ新規登録</h1>

	<form action="{{ route('review.store') }}" method="POST">
		@csrf

		<div class="card mb-4">
			<div class="card-header">評価</div>
			<div class="card-body">
				@php
					$items = [
						'graphic' => 'グラフィック',
						'volume' => 'ボリューム',
						'sound' => 'サウンド',
						'story' => 'ストーリー',
						'comfort' => '快適さ'
					];
					$score = 10;
					$evalution = 5;
				@endphp
				@foreach ($items as $k => $v)
					<div class="wrapAssessment">
						<h2>{{ $v }}</h2>
						@for ($i = 1; $i <= $score; $i++)
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="{{ $k }}" id="{{ $k }}{{ $i }}" value="{{ $i }}">
							<label class="form-check-label" for="{{ $k }}{{ $i }}">{{ $i }}</label>
						</div>
						@endfor
						@error('graphic')
						{{ $message }}
						@enderror
					</div>
				@endforeach
			</div>
		</div>

		<div class="card mb-4">
			<div class="card-header">総合評価</div>
			<div class="card-body">
				<div class="score">
					<div class="stars">
						<span>
							@for ($i = 1; $i <= $score; $i++)
								<input id="score{{ $i }}" type="radio" name="score" value="{{ $i }}">
								<label for="score{{ $i }}">★</label>
							@endfor
						</span>
					</div>
				</div>
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
			<div class="card-header">レビュー</div>
			<div class="card-body">
				<textarea name="review" rows="20" class="form-control">{{old('review')}}</textarea>
			</div>
		</div>
	
		<div class="text-center">
			<button type="submit" class="btn btn-primary">送信</button>
		</div>
	</form>

@endsection