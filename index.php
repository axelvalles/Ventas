<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Add a fivicon -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <title>Sistema de Ventas Dimeca</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/materia/bootstrap.min.css" integrity="sha384-B4morbeopVCSpzeC1c4nyV0d0cqvlSAfyXVfrPJa25im5p+yEN/YmhlgQP/OyMZD" crossorigin="anonymous">
  <!-- custom styles  -->
  <link rel="stylesheet" href="frontEnd/css/index.css">
  <!-- add font awesone 5 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
</head>

<body>
  <div class="container-fluid h-100vh bg-special">
    <div class="row h-100vh justify-content-center align-items-center">
      <div class="col-6">
        <div class="card">
          <div class="card-header p-4 text-center bg-light">
            <i class="fas fa-user display-1 text-primary mb-3"></i>
            <h1 class="h2 text-primary text-center text-uppercase">Inicia Sesión</h1>
            <p class="h5 text-secondary text-center">Administra tus produtos con facilidad.</p>
          </div>
          <div class="card-body">
            <form id="form">
              <div class="form-group">
                <label class="h5" for="user">Usuario</label>
                <input autocomplete="off" maxlength="12" onkeyup="toUpperString(this)" type="text" class="form-control" id="user" name="user" aria-describedby="userHelp" placeholder="Ingrese usuario">
                <small id="userHelp" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label class="h5" for="password">Contraseña</label>
                <input maxlength="8" type="password" class="form-control" id="password" name="password" placeholder="Ingrese contraseña">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block mb-2">Ingresar</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <script src="frontEnd/scripts/login.js"></script>
  <script src="frontEnd/scripts/helpers.js"></script>
</body>

</html>