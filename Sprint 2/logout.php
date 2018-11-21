<?php
session_start();

// Si l'usuari no està loguejat redirigim a index.php
session_start();
if(!isset($_SESSION["username"])) header("Location: index.php");

// Si està loguejat, procedim sense entrar al "if"
// Destruim la sessió
session_destroy();

// I tornem a la pàgina d'accés'
header("Location: login.php");
?>