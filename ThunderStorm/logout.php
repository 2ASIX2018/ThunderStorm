<?php
session_start();

// Si l'usuari no està loguejat redirigim a index.php
session_start();
if(!isset($_SESSION["username"])) header("Location: index.php");
// Si està registrat procedim a tancar la sessió
// Esborrem tota la informació
$_SESSION = array();
// I les cookies pròpies de l'aplicació
if(isset($_COOKIE["2ASIX2018-ThunderStorm-User"])){ 
    // Per eliminar la cookie, li posem valor nul
     // I data de validesa el dia abans
    setcookie("2ASIX2018-ThunderStorm-User", null, time()-3600);
}
if(isset($_COOKIE["2ASIX2018-ThunderStorm-Role"])){
     // Per eliminar la cookie, li posem valor nul
     // I data de validesa el dia abans
     setcookie("2ASIX2018-ThunderStorm-Role", null, time()-3600);     
}
// Esborrem la cookie amb el nom de la sessió 
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}
// Destruim la sessió
session_destroy();

// I tornem a la pàgina d'accés'
header("Location: login.php");
?>
