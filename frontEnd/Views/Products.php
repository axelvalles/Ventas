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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

  <title>Dimeca</title>
</head>

<body>
  <div class="container-fluid bg-light mb-3">
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
          <li class="nav-item">
            <a class="nav-link" href="Main.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Providers.php">Proveedores</a>
          </li>
          <li class="nav-item active">
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">

              Usuario : <?php echo ($_SESSION['user']['user']);?>

            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">

              <a class="dropdown-item <?php echo ($_SESSION['user']['rol'])=='ADMIN' ?'' :'d-none' ?>" href="#">
                Administrar usuarios</a>

              <a class="dropdown-item" href="#">Ver Perfil</a>
              <div class="dropdown-divider"></div>
              <a id="btnClose" class="dropdown-item" href=#>Cerrar sesion</a>
            </div>
          </li>
          <!--dropdown-->
        </ul>
      </div>
    </nav>
  </div>




  <!--container main-->
  <div class="container">
    <h3 class="mb-3">Lista de Productos</h3>
    <button onclick="cleanModalAdd()" type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#ModalAdd">Agregar
      <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
      </svg>
    </button>

    <table class="table table-striped">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Codigo</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Precio</th>
          <th scope="col">Costo</th>
          <th scope="col">Stock</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody class="text-center" id="table">

      </tbody>
    </table>
  </div>



  <!-- Modal  Add-->
  <div class="modal fade" id="ModalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAdd">
              <div class="form-group">
              <label for="stockAdd">Proveedor</label>
              <select name="providerAdd" id="select" class="form-control" style="width: 100%;">
                  
              </select>
            </div>
            <div class="form-group">
              <label for="codeAdd">Codigo</label>
              <input type="text" class="form-control" name="codeAdd" id="codeAdd" >
            </div>
            <div class="form-group">
              <label for="DescriptionAdd">Descripcion</label>
              <input type="text" class="form-control" name="descriptionAdd" id="descripAdd">
            </div>
            <div class="form-group">
              <label for="priceAdd">Precio</label>
              <input type="number" class="form-control" name="priceAdd" id="priceAdd">
            </div>
            <div class="form-group">
              <label for="costAdd">Costo</label>
              <input type="number" class="form-control" name="costAdd" id="costAdd">
            </div>
            <div class="form-group">
              <label for="stockAdd">Cantidad</label>
              <input type="number" class="form-control" name="stockAdd" id="stockAdd">
            </div>
            
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button onclick="addProduct()" id="btnSubmitAdd" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>

  
  <!-- End Modal  Add-->

  <!-- Modal  Edit-->
  <div class="modal fade" id="ModalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Editar Proveedores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEdit">
            <div class="form-group">
            <input type="text" class="form-control" name="id" id="id" >
              <label for="codeEdit">Codigo</label>
              <input type="text" class="form-control" name="codeEdit" id="codeEdit" >
            </div>
            <div class="form-group">
              <label for="DescriptionEdit">Descripcion</label>
              <input type="text" class="form-control" name="descriptionEdit" id="descripEdit">
            </div>
            <div class="form-group">
              <label for="priceEdit">Precio</label>
              <input type="number" class="form-control" name="priceEdit" id="priceEdit">
            </div>
            <div class="form-group">
              <label for="costEdit">Costo</label>
              <input type="number" class="form-control" name="costEdit" id="costEdit">
            </div>
            <div class="form-group">
              <label for="stockEdit">Cantidad</label>
              <input type="number" class="form-control" name="stockEdit" id="stockEdit">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button onclick="editProduct()" id="btnSubmitEdit" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>

  
  <!-- End Modal  Edit-->





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

  <script src="../scripts/Products.js"></script>
</body>

</html>