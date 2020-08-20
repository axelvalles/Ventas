<?php
require_once '../../backEnd/Functions/Login/CheckSession.php';
session_start();



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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">

              Usuario : <?php echo ($_SESSION['user']['user']);?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

              <a class="dropdown-item <?php echo ($_SESSION['user']['rol'])=='ADMIN' ?'' :'d-none' ?>" href="#"> 
              Administrar usuarios</a>

              <a class="dropdown-item" href="#">Ver Perfil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Cerrar sesion</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
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
            <li class="nav-item active">
              <a class="nav-link" href="Sales.php">Ventas</a>
            </li>
            <!--dropdown-->
            <li class="nav-item dropdown d-lg-none">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                Usuario : <?php echo ($_SESSION['user']['user']);?>

              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

                <a class="dropdown-item <?php echo ($_SESSION['user']['rol'])=='ADMIN' ?'' :'d-none' ?>" href="#">
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



    <!--container main-->
    <div class="container">

    
    
        <h3 class="">Ventas</h3>
        <div class="row">
          <div class="col-3">
          <form id="formSales">
              <div class="form-group">
              <label>Cliente</label>
              <select name="selectClient" id="selectClient" class="form-control form-control-sm">
                  
              </select>
            </div>

            <div class="form-group">
              <label for="selectProduct">Producto</label>
              <select name="selectProduct" id="selectProduct" class="form-control form-control-sm">
              </select>
            </div>

            <div class="form-group"> 
              <label for="inputCand">Cantidad</label>
              <input value="0" class="form-control form-control-sm" type="number" id="inputCand" name="inputCand">
            </div>

            <div class="form-group">
            <label for="textArea">Descripcion</label>
            <textarea readonly class="form-control form-control-sm" id="textArea"></textarea>
            </div>

            <div class="form-group"> 
              <label for="inputStock">Stock</label>
              <input  readonly class="form-control form-control-sm" type="text" id="inputStock" name="inputStock">
            </div>

            <div class="form-group"> 
              <label for="inputPrice">Precio</label>
              <input readonly class="form-control form-control-sm" type="text" id="inputPrice" name="inputPrice">
            </div>

          </form>
          <button onclick="injectDataObj()" class="btn btn-primary">
              <span>
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0v-2z"/>
                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </span> Agregar al Carrito</button>
          </div>


          <div class="col-9">
          <p class="lead"><span id="contentSaleNumber"></span></p>
          <table class="table border">
                <thead>
                  <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio Unit.</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody id="tableBody">

                </tbody>
                
                
              </table>
              
              
          </div>
        </div>

    
    </div>

    <input readonly class="d-none" type="text" id="userId" 
    value="<?php echo ($_SESSION['user']['id']);?>">

    <input readonly class="d-none" type="number" id="inputSaleNumber">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="../scripts/Sales.js"></script>
  </body>
</html>