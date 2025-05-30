<?php 
$title='';
$url_dir='../../';
include('../header.php');

$fechas = '';
$total_invertido = '';

$sql = querySQL_while("SELECT * FROM tab_reportes WHERE id_user = 24 ORDER BY id ASC");
  foreach ($sql as $key => $array) {
    $fechas .= '"'.$array['fecha'].'",';
    $tot_inv = str_replace ( "," , "" , $array['total_invertido']);
    
    $total_invertido .= $tot_inv.', ';
  }
?>

<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    
    <div class="row">
      
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Total Invertido</h4>
            <canvas id="lineChart"></canvas>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Composición de la cartera</h4>
            <canvas id="pieChart"></canvas>
          </div>
        </div>
      </div>

    </div>


    <div class="row">
      <div class="col-md-5 grid-margin stretch-card" style="cursor:pointer;">
        <div class="card">
          <div class="card-body" onclick="location.href='../users/users.php'">
            <p class="card-title text-md-center text-xl-left">Usuarios</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php total_count('user');?></h3>
              <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>  
            <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Usuarios registrados</small></span></p>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card" style="cursor:pointer;">
        <div class="card">
          <div class="card-body" onclick="location.href='../reportes/reportes.php'">
            <p class="card-title text-md-center text-xl-left">Actualizar Reporte</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php total_reportes('reportes');?></h3>
              <i class="ti-bar-chart-alt icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>  
            <p class="mb-0 mt-2"><small>Reportes registrados</small></span></p>
          </div>
        </div>
      </div>
      <div class="col-md-2 grid-margin stretch-card" style="cursor:pointer;">
        <div class="card">
          <div class="card-body" onclick="location.href='../login/logout.php'">
            <p class="card-title text-md-center text-xl-left">Cerrar sesión</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <i class="ti-power-off icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>  
            <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Cerrar admin</small></span></p>
          </div>
        </div>
      </div>
    </div>


  </div>
<!-- *div restante cierra en el footer -->
<!-- content-wrapper ends -->


 <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/chart.js"></script>

  <script>
  $(function() {
    /* ChartJS
    * -------
    * Data and config for chartjs
    */
    'use strict';
    var data = {
      labels: [<?php echo $fechas; ?>],
      datasets: [{
        label: '# of Votes',
        data: [<?php echo $total_invertido; ?>],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1,
        fill: false
      }]
    };

    var options = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      },
      legend: {
        display: false
      },
      elements: {
        point: {
          radius: 0
        }
      }

    };

    if ($("#lineChart").length) {
      var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: data,
        options: options
      });
    }
  });
  </script>
  <!-- End custom js for this page-->

<?php include('../footer.php'); ?>
