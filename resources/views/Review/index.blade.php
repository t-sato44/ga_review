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

<h1>レビュー一覧</h1>
<h1>レビューフォルダが変なのでテストコミットする</h1>
<div class="container">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($reviews as $review)
      <div class="col">
        <div class="card h-100">
          <img src="http://placehold.jp/400x300.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">投稿者: {{ $review->user->nickname }}</h5>
            <p class="card-text">レビュー: {{ $review->review }}</p>
            <div class="d-flex align-items-center">
              <div class="score me-2 text-nowrap">スコア</div>
              <div class="progress w-100">
                <div class="progress-bar" role="progressbar" style="width: {{ 5 / $review->score * 100  }};" aria-valuenow="{{ 5 / $review->score * 100  }}" aria-valuemin="0" aria-valuemax="100">{{ $review->score }}</div>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="score me-2 text-nowrap">グラフィック</div>
              <div class="progress w-100">
                <div class="progress-bar" role="progressbar" style="width: {{ 10 / $review->score * 100  }}%;" aria-valuenow="{{ $review->graphic }}" aria-valuemin="0" aria-valuemax="10">{{ $review->graphic }}</div>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="score me-2 text-nowrap">ボリューム</div>
              <div class="progress w-100">
                <div class="progress-bar" role="progressbar" style="width: {{ $review->score / 10 * 100  }}%;" aria-valuenow="{{ $review->score / 10 * 100  }}" aria-valuemin="0" aria-valuemax="100">{{ $review->score / 10 * 100  }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js"></script>
<script>
  const actions = [
    {
      name: 'Randomize',
      handler(chart) {
        chart.data.datasets.forEach(dataset => {
          dataset.data = Utils.numbers({count: chart.data.labels.length, min: 0, max: 100});
        });
        chart.update();
      }
    },
    {
      name: 'Add Dataset',
      handler(chart) {
        const data = chart.data;
        const dsColor = Utils.namedColor(chart.data.datasets.length);
        const newDataset = {
          label: 'Dataset ' + (data.datasets.length + 1),
          backgroundColor: Utils.transparentize(dsColor, 0.5),
          borderColor: dsColor,
          data: Utils.numbers({count: data.labels.length, min: 0, max: 100}),
        };
        chart.data.datasets.push(newDataset);
        chart.update();
      }
    },
    {
      name: 'Add Data',
      handler(chart) {
        const data = chart.data;
        if (data.datasets.length > 0) {
          data.labels = Utils.months({count: data.labels.length + 1});

          for (let index = 0; index < data.datasets.length; ++index) {
            data.datasets[index].data.push(Utils.rand(0, 100));
          }

          chart.update();
        }
      }
    },
    {
      name: 'Remove Dataset',
      handler(chart) {
        chart.data.datasets.pop();
        chart.update();
      }
    },
    {
      name: 'Remove Data',
      handler(chart) {
        chart.data.labels.splice(-1, 1); // remove the label first

        chart.data.datasets.forEach(dataset => {
          dataset.data.pop();
        });

        chart.update();
      }
    }
  ];

  const DATA_COUNT = 7;
  const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
  const labels = Utils.months({count: 7});
  const data = {
    labels: labels,
    datasets: [
      {
        label: 'Dataset 1',
        data: Utils.numbers(NUMBER_CFG),
        borderColor: Utils.CHART_COLORS.red,
        backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
      },
      {
        label: 'Dataset 2',
        data: Utils.numbers(NUMBER_CFG),
        borderColor: Utils.CHART_COLORS.blue,
        backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
      }
    ]
  };
  const config = {
    type: 'radar',
    data: data,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Chart.js Radar Chart'
        }
      }
    },
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

</script>

</body>

</html>
