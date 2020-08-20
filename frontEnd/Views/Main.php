<?php
require_once '../../backEnd/Functions/Login/CheckSession.php';
checkSession();
?>
<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Dimeca</title>
</head>

<body>
  <div class="container-fluid bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar navbar-brand d-lg-none">Dimeca</a>
      <ul class="navbar-nav mr-auto d-none d-lg-block">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            Usuario : <?php echo ($_SESSION['user']['user']); ?>

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">

            <a class="dropdown-item <?php echo ($_SESSION['user']['rol']) == 'ADMIN' ? '' : 'd-none' ?>" href="#">
              Administrar usuarios</a>

            <a class="dropdown-item" href="#">Ver Perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Cerrar sesion</a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Main.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Providers.php">Proveedores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Products.php">Prodcutos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Clients.php">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Sales.php">Ventas</a>
          </li>
          <!--dropdown-->
          <li class="nav-item dropdown d-lg-none">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

              Usuario : <?php echo ($_SESSION['user']['user']); ?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

              <a class="dropdown-item <?php echo ($_SESSION['user']['rol']) == 'ADMIN' ? '' : 'd-none' ?>" href="#">
                Administrar usuarios</a>

              <a class="dropdown-item" href="#">Ver Perfil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Cerrar sesion</a>
            </div>
          </li>
          <!--dropdown-->
        </ul>
      </div>
    </nav>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>