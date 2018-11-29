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
      <h5>Cambiar roles, editar servicios contratados u eliminar usuarios</h5>
      <table class="table table-hover" style="vertical-align: center;">
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
            <td style="text-align: center;">
              <button class="btn btn-success" style="margin-right:2%;">Promover</button>
              <button class="btn btn-warning" style="margin-left:2%;">Degradar</button>
            </td>
            <td style="text-align: center;"><button class="btn btn-info">Editar</button></td>
            <td style="text-align: center"><button class="btn btn-danger">Suprimir</button></td>
          </tr>
      <?php
      }
      ?>
        </tbody>
      </table>
      <hr><br>

      <h2>Gestión de servidores</h2>
      <h5>Asignar Servidor a un Usuario</h5>

      <form action="#" method="post" id="FormularioAddServer">
        <div class="control-group form-group">
          <div class="controls">
            <label>Usuario:</label>
              <select id="usuario" class="form-control" required oninvalid="document.getElementById('FormularioAddServer-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('usuario').classList.add('is-invalid');" oninput="document.getElementById('FormularioAddServer-errors').innerHTML = ''; document.getElementById('usuario').classList.remove('is-invalid');">
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
              <select id="categoria" class="form-control" required oninvalid="document.getElementById('FormularioAddServer-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('categoria').classList.add('is-invalid');" oninput="document.getElementById('FormularioAddServer-errors').innerHTML = ''; document.getElementById('categoria').classList.remove('is-invalid');">
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
                
                -- Doncs sí que era això, al haver carregat ja les variables i el fitxer dbconfig.php
                -- amb el "require_once("./models/webusers.php");" anterior, ja no tornava a carregar les dades
                -- requerides per a conectar a la base de dades, per això la variable servicios no tenia valor
                -- i, conseqüentment, el count tampoc funcionava. Canviant el require_once per require en el fitxer
                -- hem conseguit solucionar l'incidència

                */
                  require_once("./models/services.php");
                  $servicio=new Service();
                  $servicios=$servicio->listServices();
                  for ($i=0; $i<count($servicios);$i++){
                ?>
                <option value="<?php echo($servicios[$i]["id_servicio"]);?>"><?php echo($servicios[$i]["nombre"]);?></option>
                <?php
                  }
                ?>
              </select>
                <br>

                <label>Slots:</label>
                <input id="slots" type="number" class="form-control" required min="1" max="500" placeholder="¿Para cuántos jugadores?" oninvalid="document.getElementById('FormularioAddServer-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('slots').classList.add('is-invalid');" oninput="document.getElementById('FormularioAddServer-errors').innerHTML = ''; document.getElementById('slots').classList.remove('is-invalid');">
                <br>

                <label>Mensualidades a contratar:</label>
                <select id="mensualidades" class="form-control" required oninvalid="document.getElementById('FormularioAddServer-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('mensualidades').classList.add('is-invalid');" oninput="document.getElementById('FormularioAddServer-errors').innerHTML = ''; document.getElementById('mensualidades').classList.remove('is-invalid');">
                  <option value="">¿Cuantos meses ha contratado?</option>
                  <option value="1m">1 Mes</option>
                  <option value="3m">3 Meses</option>
                  <option value="6m">6 Meses</option>
                  <option value="1y">1 Año</option>
                </select>
              </div>
            </div>
            <div id="FormularioAddServer-errors" class="alert-dismissible alert-danger" style="color: red"></div>
            <br>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
          <hr><br>

      <h2>Gestión de servicios</h2>
      <h5>Añadir un servicio</h5>

      <form action="addservice.php" method="post" id="FormularioAddService" enctype="multipart/form-data">
        <div class="control-group form-group controls">
          <label>Nombre:</label>
          <input id="servicename" name="servicename" type="text" class="form-control" required placeholder="Nombre del servicio" oninvalid="document.getElementById('FormularioAddService-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('servicename').classList.add('is-invalid');" oninput="document.getElementById('FormularioAddService-errors').innerHTML = ''; document.getElementById('servicename').classList.remove('is-invalid');">
          <br>

          <label>Precio por slot:</label>
          <input id="serviceprice" name="serviceprice" type="text" class="form-control" required placeholder="Precio por slot en formato X.XX" oninvalid="document.getElementById('FormularioAddService-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('serviceprice').classList.add('is-invalid');" oninput="document.getElementById('FormularioAddService-errors').innerHTML = ''; document.getElementById('serviceprice').classList.remove('is-invalid');">
          <br>
          
          <label>Imagen del servicio (preferiblemente 1280x720):</label>
          <div class="input-group mb-3">
            <div class="custom-file">
              <input type="file" name="serviceimage" id="serviceimage"required oninvalid="document.getElementById('FormularioAddService-errors').innerHTML = 'Por favor, compruebe los datos introducidos.'; document.getElementById('serviceimage').classList.add('is-invalid');" oninput="document.getElementById('FormularioAddService-errors').innerHTML = ''; document.getElementById('serviceimage').classList.remove('is-invalid');">
            </div>
          </div>
        </div>
        <div id="FormularioAddService-errors" class="alert-dismissible alert-danger" style="color: red"></div>
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