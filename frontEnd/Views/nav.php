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
        <a class="dropdown-item" href="/logout.php">Cerrar sesion</a>
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
      <li class="nav-item ">
        <a class="nav-link" href="Providers.php">Proveedores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Products.php">Productos</a>
      </li>
      <li class="nav-item active">
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
          <a href="/logout.php" id="btnClose" class="dropdown-item">Cerrar sesion</a>
        </div>
      </li>
      <!--dropdown-->
    </ul>
  </div>
</nav>