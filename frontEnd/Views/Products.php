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
    <h3 class="mb-3">Lista de Productos</h3>
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
  <div class="modal fade" id="ModalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
              <input type="text" class="form-control" name="codeAdd" id="codeAdd">
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
              <input type="text" class="form-control" name="id" id="id">
              <label for="codeEdit">Codigo</label>
              <input type="text" class="form-control" name="codeEdit" id="codeEdit">
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





  <?php include 'scripts.php' ?>
  <script src="../scripts/Products.js"></script>
</body>

</html>