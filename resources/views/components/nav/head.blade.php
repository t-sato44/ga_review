<nav class="navbar navbar-expand-lg navbar-light bg-info sticky-top">
  <div class="container-fluid ">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('img/logo_256x256.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse justify-content-between navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0 me-2 gap-2">
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white" href="{{ route('review.index') }}">レビュー一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white" href="{{ route('review.create') }}">レビュー登録</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white" href="{{ route('game.index') }}">タイトル一覧</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white" href="{{ route('game.create') }}">タイトル登録</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white" href="{{ route('register') }}">新規会員登録</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-primary text-white" href="{{ route('mypage') }}">マイページ</a>
        </li>
      </ul>
      <form method="GET" action="#" class="d-flex">
        <input
          class="form-control me-2"
          type="search"
          placeholder="Search"
          name="search"
          value="@if (isset($search)) {{ $search }} @endif"
          aria-label="Search"
        >
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
@if (session('success'))
  <div class="alert alert-success text-center">
    {{ session('success') }}
  </div>
@endif
@if ($errors->any())
  <div class="alert alert-danger" {{ $attributes }}>
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif