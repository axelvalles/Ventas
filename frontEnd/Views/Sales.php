<?php
require_once '../../backEnd/Functions/Login/CheckSession.php';
checkSession();
?>
<?php include 'head.php'; ?>

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

              <table class="table border">
              <td colspan="2">
              <button  onclick="createSale()" class="btn btn-success">
              <span><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
              <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg></span>
              Totalizar Venta</button></td>

              <td colspan="2">
              <button onclick="destroySale()" class="btn btn-danger">
              <span>
              <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
              </span>
              Cancelar</button>
              </td>
              </table>
              
              
          </div>
        </div>

    
    </div>

    <input readonly class="d-none" type="text" id="userId" 
    value="<?php echo ($_SESSION['user']['id']);?>">

    <input readonly class="d-none" type="number" id="inputSaleNumber">

    <?php include 'scripts.php' ?>
    <script src="../scripts/Sales.js"></script>
  </body>
</html>