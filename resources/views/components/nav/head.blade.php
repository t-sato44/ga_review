<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('img/logo_256x152.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="bi bi-award-fill"></i>TOP
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownReview" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-pencil"></i>レビュー
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownReview">
            <li>
              <a class="dropdown-item" href="{{ route('review.index') }}">
                レビュー一覧
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdownGame" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-controller"></i>タイトル
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownGame">
            <li><a class="dropdown-item" href="{{ route('game.index') }}">タイトル一覧</a></li>
            <li><a class="dropdown-item" href="{{ route('game.create') }}">タイトル登録</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">
            <i class="bi bi-receipt"></i>新規会員登録
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mypage') }}">
            <i class="bi bi-tag"></i>マイページ
          </a>
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
        <button class="btn btn-outline-primary text-nowrap" type="submit">タイトル検索</button>
      </form>
  </div>
  </div>
</nav>

<div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/carousel/switch_bayonetta3_220913_l.webp') }}" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/carousel/switch_oled_pokemonSV_l.webp') }}" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('img/carousel/switch_pokemonSV_l.webp') }}" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

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