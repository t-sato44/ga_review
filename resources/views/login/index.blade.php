@extends('layouts/layout')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4">

      @if ($errors->any())
        <div class="text-danger">{{ $message }}</div>
          <ul class="mt-3 text-danger">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="logo-register text-center mb-4">
        <a href="/" class="d-inline-block">
          <img src="{{ asset('img/logo_256x256.png') }}" alt="ロゴ">
        </a>
      </div>
      
      <h1 class="text-center mb-5">会員ログイン</h1>

      <form method="POST" action="{{ route('login.index') }}">
        @csrf

        <div class="mb-4">
          <label for="email" class="form-label"><strong>{{ __('メールアドレス') }}</strong></label>
          <input id="email" class="form-control" type="text" name="email" :value="old('email')" required
            autofocus autocomplete="email">
        </div>

        <div class="mb-4">
          <label for="password" class="form-label"><strong>{{ __('パスワード') }}</strong></label>
          <input id="password" class="form-control" type="text" name="password" :value="old('password')" required
            autofocus autocomplete="password">
        </div>

        <div class="text-center">
          <button class="btn btn-primary" type="submit">ログイン</button>
        </div>

      </form>

      <div class="text-center mt-4">
        <a href="{{ route('member.create') }}" class="btn btn-warning" type="submit">新規登録する</a>
      </div>

    </div>
  </div>
</div>

@endsection