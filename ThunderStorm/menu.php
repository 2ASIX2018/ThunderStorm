<?php
session_start();

if (isset($_COOKIE['/2ASIX2018/ThunderStorm/User'])) { $_SESSION['username'] = $_COOKIE['/2ASIX2018/ThunderStorm/User'];}
if (isset($_COOKIE['/2ASIX2018/ThunderStorm/Role'])) { $_SESSION['role'] = $_COOKIE['/2ASIX2018/ThunderStorm/Role'];}
?>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">ThunderStorm</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hosting
          </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
          <a class="dropdown-item" href="games.php">Game Servers</a>
          <a class="dropdown-item" href="vps.php">Virtual Private Servers</a>
        </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="faq.php">FAQ</a>
        </li>
        -->
      </ul>
      <ul class="navbar-nav ml-auto">
        <?php
          if (isset($_SESSION['role']) && $_SESSION['role']=="admin") {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="siteadmin.php"><button type="button" class="btn btn-success btn-sm">Administrar</button></a>
          </li>
        <?php
          }
          if (!isset($_SESSION['username'])) {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php"><button type="button" class="btn btn-secondary btn-sm">Acceder</button></a>
          </li>
        <?php
          }
          else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><button type="button" class="btn btn-danger btn-sm">Desconectar</button></a>
          </li>
        <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>