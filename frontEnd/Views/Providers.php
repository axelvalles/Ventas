<?php
require_once '../../backEnd/Functions/Login/CheckSession.php';

checkSession();
?>

<?php include 'head.php'; ?>

<body>
  <div class="container-fluid bg-light mb-3">
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
          <li class="nav-item">
            <a class="nav-link" href="Main.php">Inicio</a>
          </li>
          <li class="nav-item active">
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
    <h3 class="mb-3">Lista de Proveedores</h3>
    <button onclick="cleanModalAdd()" type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#ModalAdd">Agregar
      <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z" />
        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z" />
      </svg>
    </button>

    <table class="table table-striped">
      <thead class="thead-dark text-center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre/Empresa</th>
          <th scope="col">Telefono</th>
          <th scope="col">Cedula/Rif</th>
          <th scope="col">Editar</th>
          <th scope="col">Eliminar</th>
        </tr>
      </thead>
      <tbody class="text-center" id="table">

      </tbody>
    </table>
  </div>



  <!-- Modal  Add-->
  <div class="modal fade" id="ModalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar Proveedores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAdd">
            <div class="form-group">
              <label for="nameAdd">Nombre/Empresa</label>
              <input type="text" class="form-control" name="nameAdd" id="nameAdd">
            </div>
            <div class="form-group">
              <label for="phoneAdd">Telefono</label>
              <input type="text" class="form-control" name="phoneAdd" id="phoneAdd">
            </div>
            <div class="form-group">
              <label for="nidAdd">Cedula/Rif</label>
              <input type="text" class="form-control" name="dniAdd" id="dniAdd">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button onclick="addProvider()" id="btnSubmitAdd" class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- End Modal  Add-->

  <!-- Modal  Edit-->
  <div class="modal fade" id="ModalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
              <input type="text" class="form-control d-none" name="idEdit" id="idEdit">
              <label for="nameAdd">Nombre/Empresa</label>
              <input type="text" class="form-control" name="nameEdit" id="nameEdit">
            </div>
            <div class="form-group">
              <label for="phoneAdd">Telefono</label>
              <input type="text" class="form-control" name="phoneEdit" id="phoneEdit">
            </div>
            <div class="form-group">
              <label for="nidAdd">Cedula/Rif</label>
              <input type="text" class="form-control" name="dniEdit" id="dniEdit">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button onclick="editProvider()" id="btnSubmitEdit" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- End Modal  Edit-->





  <?php include 'scripts.php' ?>

  <script src="../scripts/Providers.js"></script>
</body>

</html>