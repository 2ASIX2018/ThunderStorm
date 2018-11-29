<?php
session_start();
// Càrreguem la classe "Usuari" que tenim en webusers.php
require("./models/webusers.php");

// Instanciem un usuari a partir de la classe que hem creat
$usuari=new WebUser();

// Definim les variables que arreplegaran les dades del formulari
$user=$_REQUEST["inputUser"];
$pass=$_REQUEST["inputPassword"];
$remember=$_REQUEST["rememberMe"];

// Comprovem l'usuari amb el mètode validateUser
$role=$usuari->validateUser($user, $pass);

// Si l'usuari es valida correctament
if ($role){
    // Establim l'usuari que s'ha logat (per a poder mostrar-ho després en la web)
    $_SESSION['username']=$user;
    // Establim el rol de la sessió
    $_SESSION['role']=$role;

    // Si l'usuari ho ha indicat, guardem les credencials
    if($remember=="true"){
        setcookie('2ASIX2018-ThunderStorm-User', $_SESSION['username'], time() + 604800); 
        setcookie('2ASIX2018-ThunderStorm-Role', $_SESSION['role'], time() + 604800); 
    }

    // Página d'inici o home

    // Còpia antiga redirecció simple
    // header("Location: index.php");

    // Nova redirecció:
    // Si es administrador, redirigeix a siteadmin en 1 segon.
    if ($role=="admin"){
        header("refresh: 1; url=siteadmin.php"); 
    }
    // Si es usuari, redirigeix a index en 1 segon.
    elseif ($role=="user"){
        header("refresh: 1; url=index.php");
    }
    // Mentres, ens mostrarà una xicoteta animació en html.
    ?>
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="./css/cercleblau.css" rel="stylesheet" id="bootstrap-css">
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./vendor/jquery/jquery.min.js"></script>
    <div id="cercle">
        <h2 class="text-white" style="text-align: center;">Verificando</h2>
        <div class="loader">
            <div class="loader">
                <div class="loader">
                    <div class="loader">
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
    exit();
}
// Si el login no ha tingut èxit, en dirigirà a:
else {
    // Página d'error en login
    header("refresh: 1; url=loginfailed.php"); 
    ?>
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="./css/cercleblau.css" rel="stylesheet" id="bootstrap-css">
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./vendor/jquery/jquery.min.js"></script>
    <div id="cercle">
        <h2 class="text-white" style="text-align: center;">Verificando</h2>
        <div class="loader">
            <div class="loader">
                <div class="loader">
                    <div class="loader">
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <?php
    exit();
}
?>