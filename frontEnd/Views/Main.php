<?php
require_once '../../backEnd/Functions/Login/CheckSession.php';
checkSession();
?>

<?php include 'head.php'; ?>

<body>
  <div class="container-fluid bg-light">
    <?php include 'nav.php'; ?>
  </div>

  <canvas id="myChart" style="height: 50%; width: 50%;"></canvas>
  <?php include 'scripts.php' ?>

  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'Producto mas vendido del mes',
            backgroundColor: ['rgb(255, 99, 132)','red','blue','green','black','purple','pink'],
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45]
        }]
    },

    // Configuration options go here
    options: {}
});
  </script>
</body>

</html>