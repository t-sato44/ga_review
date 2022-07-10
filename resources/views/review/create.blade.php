@extends('layouts/layout')

@section('content')

	<h1 class="h5">クチコミ新規登録</h1>

	<x-form-layout>
		<form action="{{ route('review.store') }}" method="POST">
			@csrf
			<div class="mb-3">
				<div class="py-3">
					<label for="graphic" class="form-label">グラフィック</label>
					@if( old('graphic') )
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="1" id="graphic1" name="graphic">
							<label class="form-check-label" for="graphic1">1</label>
						</div>
					@else
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="graphic1" name="graphic">
						<label class="form-check-label" for="graphic1">1</label>
					</div>
					@endif
				</div>
				<div class="py-3">
					<label for="device" class="form-label">プレイ機器</label>
					@if( old('device') )
						<input type="text" class="form-control" id="device" name="device" value="{{old('device')}}">
					@else
						<input type="text" class="form-control" id="device" name="device" value="">
					@endif
				</div>
			</div>
			<div class="py-3">
				<label for="name_kana" class="form-label">総合評価</label>
				@if( old('name_kana') )
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="score1" name="score">
						<label class="form-check-label" for="score1">1</label>
					</div>
				@else
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="1" id="score1" name="score">
						<label class="form-check-label" for="score1">1</label>
					</div>
				@endif
			</div>
			<div class="py-3">
				<label class="form-label">レビュー</label>
				@if ( old('review') )
					<textarea name="review" id="review" rows="7" class="form-control">{{ old('review') }}</textarea>
				@else
					<textarea name="review" id="review" rows="7" class="form-control"></textarea>
				@endif
			</div>
			<div class="mt-4">
				<button type="submit" class="btn btn-primary">登録する</button>
			</div>
		</form>
	</x-form-layout>

@endsection