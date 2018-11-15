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
      <h1 class="mt-4 mb-3">Acceder
        <small>Area cliente</small>
      </h1>

    <div class="container">
		<div class="alert alert-danger" role="alert">
    		Error: Credenciales Incorrectos.
		</div>
		<a href="login.php">Volver</a>
    <p>No dispones de un usuario? <a href="register.php">Crealo aquí!</a></p>
    </div>

    <!-- Pie de página -->
    <?php
      require_once ("footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>