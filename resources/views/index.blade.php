@extends('layouts/layout')

@section('content')

<div class="container">
    <h1 class="mb-4">トップページ</h1>

    @if (session('login_msg'))
      <div class="alert alert-success">
        {{ session('login_msg') }}
      </div>
    @endif
    
    <div class="card">
      <div class="card-header">
        ログイン状態
      </div>
      <div class="card-body">
        @if (Auth::guard('members')->check())
          <h3>会員としてログイン中</h3>
          <div>メールアドレス {{ Auth::guard('members')->user()->email }}でログイン中</div>
        @elseif(Auth::guard('administrators')->check())
          <h3>管理者としてログイン中</h3>
          <div>メールアドレス {{ Auth::guard('administrators')->user()->email }}でログイン中</div>
        @else
          <div>ログインしていません</div>
        @endif
      </div>
    </div>

  </div>

@endsection
