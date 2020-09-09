<?php
require_once '../../backEnd/Functions/Login/CheckSession.php';

checkSession();
?>

<?php include 'head.php'; ?>

<body>

  <div class="container-fluid bg-light mb-3">
    <?php include 'nav.php'; ?>
  </div>




  <!--container main-->
  <div class="container">
    <h3 class="mb-3">Historial de Ventas</h3>
    
    <table class="table table-striped">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col">Factura #</th>
          <th scope="col">Cliente</th>
          <th scope="col">Usuario</th>
          <th scope="col">Total</th>
          <th scope="col">Fecha</th>
          <th scope="col">Ver Detalles</th>
        </tr>
      </thead>
      <tbody class="text-center" id="table">

      </tbody>
    </table>
  </div>



  <?php include 'scripts.php' ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script src="../scripts/Record.js"></script>
  
</body>

</html>