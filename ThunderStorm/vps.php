<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Xavi Ciscar">

    <title>ThunderStorm | VPS</title>

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
      <h1 class="mt-4 mb-3">VPS
        <small>Planes</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">VPS</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h3 class="card-header bg-primary text-white progress-bar-striped">Básico</h3>
            <div class="card-body">
              <div class="display-4">4.99€</div>
              <div class="font-italic">al mes</div>
              <span class="badge badge-primary">Lo mejor para empezar</span>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">4 GB RAM</li>
              <li class="list-group-item">1 Core (Intel® Xeon® E5-2620v3)</li>
              <li class="list-group-item">100GB (100% SSD)</li>
              <li class="list-group-item">
                <a href="#" class="btn btn-primary">Contratar</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card card-outline-primary h-100">
            <h3 class="card-header bg-success text-white progress-bar-striped">Plus</h3>
            <div class="card-body">
              <div class="display-4">9.99€</div>
              <div class="font-italic">al mes</div>
              <span class="badge badge-primary">Tonto el d'enmig</span>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">8 GB RAM</li>
              <li class="list-group-item">2 Cores (Intel® Xeon® E5-2620v3)</li>
              <li class="list-group-item">200GB (100% SSD)</li>
              <li class="list-group-item">
                <a href="#" class="btn btn-primary">Contratar</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h3 class="card-header bg-danger text-white progress-bar-striped">Avanzado</h3>
            <div class="card-body">
              <div class="display-4">14.99€</div>
              <div class="font-italic">al mes</div>
              <span class="badge badge-primary">Máximo Rendimiento</span>
              <span class="badge badge-danger" style="color: black;">Antes 19.99€</span>
              <span class="badge badge-success">25% OFF</span>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">16 GB RAM</li>
              <li class="list-group-item">4 Cores (Intel® Xeon® E5-2620v3)</li>
              <li class="list-group-item">400GB (100% SSD)</li>
              <li class="list-group-item">
                <a href="#" class="btn btn-primary">Contratar</a>
              </li>
            </ul>
          </div>
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