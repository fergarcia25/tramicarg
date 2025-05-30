<?php 
$title='Panel';
$page='user';

include('partial/header.php'); 

if(!empty($_SESSION['id_user'])){ 
$id_user = $_SESSION['id_user'];

include ("config/connection.php");
include ("config/functions.php");


$fechas = '';
$total_invertido = '';

$sql = querySQL_while("SELECT * FROM tab_reportes WHERE id_user = $id_user ORDER BY id ASC");

foreach ($sql as $key => $array) {
    $fechas .= '"'.$array['fecha'].'",';
    $tot_inv = str_replace ( "," , "" , $array['total_invertido']);
    $nombre = $array['nombre'];

    $total_invertido .= $tot_inv.', ';
}

//include header


?>

<section class="panel-section block-animate-write">
    <div class="container">
        <div class="row">
            <div class="col-md-7 offset-md-5 ">
                <div class="title-section rounded line-animation anim-typewriter text-right">
                    <h2>Hola <?php echo $_SESSION['name_user'] ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
        
            <div class="col-lg-7 grid-margin stretch-card mb-5">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Invertido</h4>
                    <canvas id="lineChart"></canvas>
                </div>
                </div>
            </div>
            
            <div class="col-lg-5 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Composición de la cartera</h4>
                    <canvas id="pieChart"></canvas>
                </div>
                </div>
            </div>

        </div>


                    

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card my-5">
                <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID Usuario</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                            <th>Val. Cuotaparte</th>
                            <th>Fecha</th>
                            <th>Total Invertido</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = querySQL_while("SELECT * FROM tab_reportes ORDER BY id ASC");
                            foreach ($sql as $key => $array) {
                            ?>
                            
                        <tr>
                            <td><?php echo $array['id_user'];?></td>
                            <td><?php echo $array['nombre'];?></td>
                            <td><?php echo $array['acciones'];?></td>
                            <td><?php echo $array['valor_cuotaparte'];?></td>
                            <td><?php echo $array['fecha'];?></td>
                            <td><?php echo $array['total_invertido'];?></td>                
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
</section>





 <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="admin/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="admin/js/off-canvas.js"></script>
  <script src="admin/js/hoverable-collapse.js"></script>
  <script src="admin/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="admin/js/chart.js"></script>

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

<?php //include footer
include('partial/footer-sm.php'); 
 
}else{
  "Acceso restringido";
} 
?>
