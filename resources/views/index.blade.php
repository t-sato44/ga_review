@extends('layouts/layout')

@section('content')

<div class="container">
  <h1 class="mb-4">トップページ</h1>
  @can('admin')
	<p>あなたは管理者です</p>
@elsecan('edit')
	<p>あなたは編集者です</p>
@elsecan('read')
	<p>あなたは閲覧者です</p>
@else
	<p>あなたに権限はありません</p>
@endcan
</div>

@endsection