<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Xavi Ciscar">

    <title>ThunderStorm | Acceder</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Menu -->
    <?php
      require_once ("menu.php");
    ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Acceder</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Acceder</li>
      </ol>

      <!-- Formulari d'accés -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Acreditarse en el sistema</h3>
          <form action="logincheck.php" method="post" id="FormularioAcceso">
            <div class="control-group form-group">
              <div class="controls">
                <label>Usuario:</label>
                <input id="InputUsuari" type="text" class="form-control" name="inputUser" required="required" placeholder="usuario" oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, introduce tu nombre de usuario.'; document.getElementById('InputUsuari').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('InputUsuari').classList.remove('is-invalid');">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Contraseña:</label>
                <input id="InputContrasenya" type="password" class="form-control" name="inputPassword" required="required" placeholder="contraseña" oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, introduce tu contraseña.'; document.getElementById('InputContrasenya').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('InputContrasenya').classList.remove('is-invalid');">
              </div>
            </div>         
            <div class="checkbox">
              <label>
                <input type="checkbox" name="rememberMe" id="rememberMe" value="true">
                Recordarme en este equipo
              </label>
              </div>         
            <div class="controls">
              <label>No estás registrado? <a href="register.php">Regístrate ahora!</a></label>
            </div>
            <div id="controla-errors" class="alert-dismissible alert-danger" style="color: red"></div>
            <button type="submit" class="btn btn-primary">Acceder</button>
          </form>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Pie de página -->
    <?php
      require_once ("footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
