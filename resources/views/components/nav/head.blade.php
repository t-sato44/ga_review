<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container-fluid ">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('img/logo_256x256.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-2">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('review.index') }}">レビュー</a>
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
      <div class="ms-2">
        <a href="{{ route('register') }}" class="btn btn-primary">会員登録</a>
      </div>
    </div>
  </div>
</nav>