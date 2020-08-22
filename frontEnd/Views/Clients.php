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
    <h3 class="mb-3">Lista de Clientes</h3>
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
          <th scope="col">Nombre</th>
          <th scope="col">Telefono</th>
          <th scope="col">Cedula</th>
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
          <h5 class="modal-title" id="staticBackdropLabel">Agregar Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formAdd">
            <div class="form-group">
              <label for="nameAdd">Nombre</label>
              <input type="text" class="form-control" name="nameAdd" id="nameAdd">
            </div>
            <div class="form-group">
              <label for="phoneAdd">Telefono</label>
              <input onkeyup="formatNumberPhone(this)" maxlength="14" type="text" class="form-control" name="phoneAdd" id="phoneAdd">
            </div>
            <div class="form-group">
              <label for="nidAdd">Cedula</label>
              <input type="text" class="form-control" name="dniAdd" id="dniAdd">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button onclick="addClient()" id="btnSubmitAdd" class="btn btn-primary">Agregar</button>
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
          <h5 class="modal-title" id="staticBackdropLabel">Editar Clientes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formEdit">
            <div class="form-group">
              <input type="text" class="form-control" name="idEdit" id="idEdit">
              <label for="nameAdd">Nombre</label>
              <input type="text" class="form-control" name="nameEdit" id="nameEdit">
            </div>
            <div class="form-group">
              <label for="phoneAdd">Telefono</label>
              <input onkeyup="formatNumberPhone(this)" maxlength="14" type="text" class="form-control" name="phoneEdit" id="phoneEdit">
            </div>
            <div class="form-group">
              <label for="nidAdd">Cedula</label>
              <input type="text" class="form-control" name="dniEdit" id="dniEdit">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button onclick="editClients()" id="btnSubmitEdit" class="btn btn-primary">Editar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- End Modal  Edit-->





  <?php include 'scripts.php' ?>
  <script src="../scripts/Clients.js"></script>
</body>

</html>