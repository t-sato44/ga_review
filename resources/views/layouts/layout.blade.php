<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  {{-- @includeWhen(config("app.ga"), 'ga') --}}
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ config('app.description') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @hasSection('title')
    <title>@yield('title') | {{ config('app.name') }}</title>
  @else
    <title>{{ config('app.name') }}</title>
  @endif
  <link rel="icon" type="image/png" sizes="16x16"  href="{{ asset('img/favicon-16x16.png') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @hasSection('title')
    <meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
  @else
    <meta property="og:title" content="{{ config('app.name') }}" />
  @endif
  <meta property="og:description" content="{{ config('app.description') }}" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ url('/', null, true) }}/img/eyecatch_900x600.jpg" />
  <meta property="og:site_name" content="{{ config('app.name') }}" />
  <meta property="og:locale" content="ja_JP" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

  <x-nav.head />
  
  @yield('content')

  <footer class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <div>{{ config('app.name') }}</div>
          <div>
            <div>{{ config('app.zip') }}</div>
            <div>{{ config('app.address1') }}</div>
            <div>{{ config('app.address2') }}</div>
          </div>
        </div>
        <div class="col-12 col-md-6 text-end">
          <ul class="mb-5 list-inline">
            <li class="list-inline-item">ABOUT</li>
            <li class="list-inline-item">MEMBERS</li>
            <li class="list-inline-item">SERVICES</li>
            <li class="list-inline-item">CONTACT</li>
          </ul>
          <ul class="mb-2 list-inline">
            <li class="list-inline-item">Twitter</li>
            <li class="list-inline-item">Facebook</li>
            <li class="list-inline-item">note</li>
          </ul>
          &copy; {{ config("app.copyright") }}
        </div>
      </div>
    </div>
  </footer>
  
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>