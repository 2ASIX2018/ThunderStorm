<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Xavi Ciscar">

    <title>ThunderStorm | Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Menu -->
    <?php
      require_once ("menu.php");
      if($_SESSION["role"]!="admin") header("Location: index.php");
    ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Administració
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
      </ol>
      <?php
      require_once("./models/webusers.php");
      $usuario=new WebUser();
      $usuarios=$usuario->listUsers();
      ?>
      <h2>Gestión de usuarios</h2>
      <table class="table table-hover">
        <thead class="bg-dark text-white">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col" colspan="3" style="text-align: center">Acciones</th>
          </tr>
        </thead>
        <tbody>
      <?php
      for ($i=0; $i<count($usuarios);$i++){
      ?>
          <tr class="table-active">
            <th scope="row"><?php echo($usuarios[$i]["nombre"]);?></th>
            <td><?php echo($usuarios[$i]["email"]);?></td>
            <td><?php echo($usuarios[$i]["rol"]);?></td>
            <td style="text-align: center;"><button class="btn btn-success" style="margin-right:2%;">Promover</button><button class="btn btn-warning" style="margin-left:2%;">Degradar</button></td>
            <td style="text-align: center;"><button class="btn btn-info">Editar</button></td>
            <td style="text-align: center"><button class="btn btn-danger">Suprimir</button></td>
          </tr>
      <?php
      }
      ?>
        </tbody>
      </table>

      <h2>Gestión de servidores</h2>
      <h4>Asignar Servidor a un Usuario</h4>

      <form action="#" method="post" id="FormularioAddServer">
        <div class="control-group form-group">
          <div class="controls">
            <label>Usuario:</label>
              <select id="usuario" class="form-control" required oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('usuario').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('usuario').classList.remove('is-invalid');">
                <option value="">Selecciona el propietario</option>
                <?php
                  for ($i=0; $i<count($usuarios);$i++){
                ?>
                <option value="<?php echo($usuarios[$i]["id_usuari"]);?>"><?php echo($usuarios[$i]["nombre"]);?></option>
                <?php
                  }
                ?>
              </select>
              <br>

            <label>Categoría:</label>
              <select id="categoria" class="form-control" required oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('categoria').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('categoria').classList.remove('is-invalid');">
                <option value="">Elija el tipo de servidor a asignar</option>

                <?php
                /*

                Segons he pogut comprovar, aquest causa conflicte amb el require anterior i volca el següent error:

                PHP Notice: Undefined variable: dbhost in /home/eljust/Escriptori/github/ThunderStorm/ThunderStorm/models/services.php
                on line 7, referer: http://localhost/IAW/ThunderStorm/index.php

                Obviament, no carregant el services.php no va a funcionar el for ni el count, com ens recalca aquest error:

                PHP Warning:  count(): Parameter must be an array or an object that implements Countable in
                /home/eljust/Escriptori/github/ThunderStorm/ThunderStorm/siteadmin.php on line 89,
                referer: http://localhost/IAW/ThunderStorm/index.php

                  require_once("./models/services.php");
                  $servicio=new Service();
                  $servicios=$servicio->listServices();
                  for ($i=0; $i<count($servicios);$i++){
                  */
                ?>
                <!--
                <option value="<?php echo($servicios[$i]["id_servicio"]);?>"><?php echo($servicios[$i]["nombre"]);?></option>
                -->
                <?php
                /*
                  }
                */
                ?>
              <!-- Posarem temporalment el codi amb HTML fins solventar l'incidencia amb PHP -->
                <option value="1">ARK: Survival Evolved</option>
                <option value="2">Arma 3</option>
                <option value="3">Counter-Strike: Global Offensive</option>
                <option value="4">Minecraft</option>
                <option value="5">Rust</option>
                <option value="6">Unturned</option>
              <!-- Fi de codi HTML Temporal -->

              </select>
                <br>

                <label>Slots:</label>
                <input id="slots" type="number" class="form-control" required min="1" max="500" placeholder="¿Para cuántos jugadores?" oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('slots').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('slots').classList.remove('is-invalid');">
                <br>

                <label>Mensualidades a contratar:</label>
                <select id="mensualidades" class="form-control" required oninvalid="document.getElementById('controla-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('mensualidades').classList.add('is-invalid');" oninput="document.getElementById('controla-errors').innerHTML = ''; document.getElementById('mensualidades').classList.remove('is-invalid');">
                  <option value="">¿Cuantos meses ha contratado?</option>
                  <option value="1m">1 Mes</option>
                  <option value="3m">3 Meses</option>
                  <option value="6m">6 Meses</option>
                  <option value="1y">1 Año</option>
                </select>
              </div>
            </div>
            <div id="controla-errors" class="alert-dismissible alert-danger" style="color: red"></div>
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>

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