<x-app-layout>
  <h2>マイページ</h2>

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form>
          <div class="mb-3">
						<div class="py-2">
							<label for="pr" class="form-label">自己紹介</label>
							<textarea name="pr" id="pr" rows="5" class="w-100 form-control"></textarea>
						</div>
            <div class="py-2">
							<label for="name" class="form-label">名前</label>
							<input type="text" class="form-control" id="name">
						</div>
          </div>
          <div class="py-2">
            <label for="kana" class="form-label">フリガナ</label>
            <input type="text" class="form-control" id="kana">
          </div>
          <div class="py-2">
            <label class="form-label">性別</label>
            <div class="form-check">
							<input class="form-check-input" type="radio" name="gender" id="gender1">
							<label class="form-check-label" for="gender1">男性</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" id="gender2" checked>
							<label class="form-check-label" for="gender2">女性</label>
						</div>
          </div>
					<div class="py-2">
            <label for="birthday" class="form-label">誕生日</label>
            <input type="date" class="form-control" id="birthday">
					</div>
					<div class="py-2">
						<label class="form-label">都道府県</label>
						<select class="form-select">
							<option selected>選択してください</option>
							@foreach ($prefectures as $k => $v)
								<option value="{{ $k }}">{{ $v }}</option>
							@endforeach
						</select>
					</div>
          <button type="submit" class="btn btn-primary">登録する</button>
        </form>
      </div>
    </div>
  </div>

</x-app-layout>
