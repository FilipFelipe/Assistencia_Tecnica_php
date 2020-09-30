@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Charts</h1>
        <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme. The charts below
            have been customized - for further customization options, please visit the <a target="_blank"
                href="https://www.chartjs.org/docs/latest/">official Chart.js documentation</a>.</p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Número de Ordens</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>

                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Acessos no Site</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Uso de usuários</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="Chart"></canvas>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    
@endsection

@section('grafico')
<script>
  var ctx = document.getElementById("Chart");
  var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: ["df", "Feminino", "Outros"],
          datasets: [{
              data: [1,1,2],
              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
              hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
      },
      options: {
          maintainAspectRatio: false,
          tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
          },
          legend: {
              display: false
          },
          cutoutPercentage: 80,
      },
  });

</script>
@endsection