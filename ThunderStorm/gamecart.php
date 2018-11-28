<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Xavi Ciscar">

    <title>ThunderStorm | GameCart</title>

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
      <h1 class="mt-4 mb-3">Contratar</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">GameCart</li>
      </ol>

      <!-- Formulari per realitzar comandes -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Solicitar un servidor</h3>
          <form action="#" method="post" id="FormularioJuego">
            <div class="control-group form-group">
              <div class="controls">

                <label>Categoría:</label>
                <select id="categoria" class="form-control" required oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('categoria').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('categoria').classList.remove('is-invalid');">
                  <option value="">¿De qué juego lo quieres?</option>
                  <option value="1">ARK: Survival Evolved</option>
                  <option value="2">Arma 3</option>
                  <option value="3">Counter-Strike: Global Offensive</option>
                  <option value="4">Minecraft</option>
                  <option value="5">Rust</option>
                  <option value="6">Unturned</option>
                </select>
                <br>

                <label>Slots:</label>
                <input id="slots" type="number" class="form-control" required min="1" max="500" placeholder="¿Para cuántos jugadores?" oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('slots').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('slots').classList.remove('is-invalid');">
                <br>

                <label>Mensualidades a contratar:</label>
                <select id="mensualidades" class="form-control" required oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('mensualidades').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('mensualidades').classList.remove('is-invalid');">
                  <option value="">¿Cuantos meses deseas pagar?</option>
                  <option value="1m">1 Mes</option>
                  <option value="3m">3 Meses (-5% Descuento)</option>
                  <option value="6m">6 Meses (-10% Descuento)</option>
                  <option value="1y">1 Año (-25% Descuento)</option>
                </select>
              </div>
            </div>

            <div class="checkbox">
              <label>
                <input id="mayoraceptacondiciones" name="mayoraceptacondiciones" type="checkbox" required value="true" oninvalid="document.getElementById('controla-errors').innerHTML = 'Debe aceptar las condiciones del servicio';" oninput="document.getElementById('controla-errors').innerHTML = '';">
                Confirmo que soy mayor de edad y que he leído y acepto las condiciones de servicio.
              </label>
            </div>

            <div id="controla-errors" class="alert-dismissible alert-danger" style="color: red"></div>
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
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
