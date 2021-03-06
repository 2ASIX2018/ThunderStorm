<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Xavi Ciscar">

    <title>ThunderStorm | Darse de alta</title>

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
      <h1 class="mt-4 mb-3">Registro
        <small>Area cliente</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Registro</li>
      </ol>

      <!-- Formulari d'accés -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Regístrate en el sistema</h3>
          <form action="registercheck.php" method="post" id="FormularioRegistro">
            <div class="control-group form-group">
              <div class="controls">
                <label>Usuario:</label>
                <input type="text" class="form-control" name="inputUser" required="required" placeholder="usuario" oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, introduce tu nombre de usuario.'" oninput="document.getElementById('controla-errors').innerHTML = ''">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Contraseña:</label>
                <input type="password" class="form-control" name="inputPassword" required="required" placeholder="contraseña" oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, introduce tu contraseña.'" oninput="document.getElementById('controla-errors').innerHTML = ''">
              </div>
            </div>         
            <div class="checkbox">
              <label><input type="checkbox" name="condiciones" id="condiciones" value="true">
                He leído y acepto las condiciones.
              </label>
              </div>         
            <div class="controls">
              <label>Ya estás registrado? <a href="login.php">Accede ahora!</a></label>
            </div>
            <div id="controla-errors" style="color: red"></div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
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