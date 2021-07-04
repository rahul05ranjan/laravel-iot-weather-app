<?php
use App\Models\Weather;
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Weather App</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   </head>
   <body class="antialiased">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Weather App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      <div class="container">
      <div class="row mt-3">
      	<div class="col-md-4">
      		<div class="card" style="width: 18rem;">
              <div class="card-body">
                <h1 class="card-title"><small>Temperature</h1>
                <h3></small>{{ $model->temperature }} &#8451;</h3>
                <h6>{{ $model->updated_at->diffForHumans() }}</h6>
              </div>
            </div>
      	</div>
      	<div class="col-md-4">
      		<div class="card" style="width: 18rem;">
              <div class="card-body">
                <h1 class="card-title"><small>Humidity</h1>
                <h3></small>{{ $model->humidity }} %</h3>
                <h6>{{ $model->updated_at->diffForHumans() }}</h6>
              </div>
            </div>
      	</div>
      </div>
         <div class="row">
            <div class="col-md-12">
               <div id="chart"></div>
            </div>
         </div>
      </div>
      <?php 
      $getAll = Weather::whereDate('updated_at', Carbon::today())->get();
      $temperature = [];
      $humidity = [];
      $date = [];
      
          foreach ($getAll as $value) {
              $temperature[] = $value->temperature;
              $humidity[] = $value->humidity;
              $dt = new DateTime($value->updated_at);
              $dt->setTimezone(new DateTimeZone('Asia/Kolkata'));
              $date[] = $dt->format('Y-m-d\TH:i:s.u\Z');
          }
          
          $temp = implode(",", $temperature);
          $humi = implode(",", $humidity);
          
          $datee = json_encode($date);
          //ddd($datee);
          //$dat = implode(",", $datee);
          
      ?>
      <script>
        var options = {
          series: [
          {
          name: 'Humidity',
          data: [{{ $humi }}]
        },{
          name: 'Temperature',
          data: [
          	{{ $temp }}
          ]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: <?php echo $datee; ?>
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      </script>
   </body>
</html>