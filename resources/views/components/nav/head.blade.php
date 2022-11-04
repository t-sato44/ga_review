<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('img/logo_256x256.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">TOP3</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownReview" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            レビュー14
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownReview">
            <li><a class="dropdown-item" href="{{ route('review.index') }}">レビュー一覧</a></li>
            <li><a class="dropdown-item" href="{{ route('review.create') }}">レビュー登録</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownGame" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            タイトル
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownGame">
            <li><a class="dropdown-item" href="{{ route('game.index') }}">タイトル一覧</a></li>
            <li><a class="dropdown-item" href="{{ route('game.create') }}">タイトル登録</a></li>
          </ul>
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
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">新規会員登録</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mypage') }}">マイページ</a>
        </li>
      </ul>
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