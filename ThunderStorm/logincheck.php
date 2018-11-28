<?php
session_start();
// Càrreguem la classe "Usuari" que tenim en webusers.php
require_once("./models/webusers.php");

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
    header("Location: index.php");
    exit();
}
// Si el login no ha tingut èxit, en dirigirà a:
else {
    // Página d'error en login
    header("Location: loginfailed.php");
    exit();
}
?>