<!DOCTYPE HTML>
<html>

<head>
  <title>レビュー投稿</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/ga_review.css') }}" rel="stylesheet">
  <!-- Styles -->
  <style>
  </style>
</head>

<body>

   <h2>レビュー一覧</h2>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>game_id</th>
      <th>user_id</th>
      <th>review</th>
      <th>score</th>
      <th>graphic</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($reviews2 as $review)
      <tr>
        <td>{{ $review->id }}</td>
        <td>{{ $review->game_id }}</td>
        <td>{{ $review->user_id }}</td>
        <td>{{ $review->review }}</td>
        <td>{{ $review->score }}</td>
        <td>{{ $review->graphic }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

</body>

</html>
