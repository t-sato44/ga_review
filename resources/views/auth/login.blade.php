@extends('layouts/layout')

@section('content')

@if (session('status'))
  <div class="mb-4">
    {{ session('status') }}
  </div>
@endif

<div class="container">
  <div class="row">
    <div class="col-md-4 offset-md-4">

			<div class="logo-register text-center mb-4">
        <a href="/" class="d-inline-block">
          <img src="{{ asset('img/logo_256x256.png') }}" alt="ロゴ">
        </a>
      </div>

			<form method="POST" action="{{ route('login') }}">
				@csrf
				<div>
					<label for="email" class="form-label">Email</label>
					<input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
				</div>

				<div class="mt-4">
					<label for="password" class="form-label">Password</label>
					<input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
				</div>

				<div class="mt-4">
					<label for="remember_me" class="form-label">remember</label>
					<div class="list-group-item">
						<input id="remember_me" name="remember" class="form-check-input me-1" type="checkbox">
						<span class="">Remember me</span>
					</div>
				</div>

				<div class="mt-4 d-flex align-items-center">
					@if (Route::has('password.request'))
						<a class="" href="{{ route('password.request') }}">
							Forgot your password?
						</a>
					@endif
					<button type="submit" class="btn btn-primary ms-auto">Logi in</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection