<?php
session_start();

// Vector temporal amb els usuaris
// Després caldrà consultar a la base de dades
$usuaris=["admin", "user"];
$user=$_REQUEST["inputUser"];
$pass=$_REQUEST["inputPassword"];
$remember=$_REQUEST["rememberMe"];

if ($pass=="1234" && in_array($user, $usuaris)) {
    // Usuari logat amb èxit.

    $_SESSION['username']=$user;
    // Establim el rol de la sessió
    if ($user=="admin")
        $_SESSION['role'] = "admin";
    else if ($user=="user")
        $_SESSION['role'] = "user";

    // Si l'usuari ho ha indicat, guardem les credencials
    if($remember=="true") {
        setcookie('/2ASIX2018/ThunderStorm/User', $_SESSION['username'], time() + 604800); 
        setcookie('/2ASIX2018/ThunderStorm/Role', $_SESSION['role'], time() + 604800); 
    }

    // Página d'inici o home
    header("Location: index.php");
    exit();
}
else {
    // Página d'error en login
    header("Location: loginfailed.php");
    exit();
}
?>