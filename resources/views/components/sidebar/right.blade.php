@if ( Auth::check() )
  <div class="h5 mb-4">
    {{ Auth::user()->name }}さん こんにちは
  </div>
  <div class="card">
    <div class="card-header">
      メニュー
    </div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item">
          <a href="{{ route('mypage') }}" class="btn">マイページ</a>
        </li>
        <li class="list-group-item">
          <a href="{{ route('review.create') }}" class="btn">クチコミ新規登録</a>
        </li>
        <li class="list-group-item">
          <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn">ログアウト</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
@else
  <div class="card">
    <div class="card-header">
      ログイン
    </div>
    <div class="card-body">
      <ul class="list-group">
        <li class="list-group-item">
          <a href="{{ route('login') }}" class="btn">ログイン</a>
        </li>
        <li class="list-group-item">
          <a href="{{ route('register') }}" class="btn">クチコミメンバー新規登録</a>
        </li>
      </ul>
    </div>
  </div>
@endif