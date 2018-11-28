<?php
session_start();
// Càrreguem la classe "Usuari" que tenim en webusers.php
require_once("./models/webusers.php");

// Instanciem un usuari a partir de la classe que hem creat
$usuari=new WebUser();

// Definim les variables que arreplegaran les dades del formulari
$user=$_REQUEST["registerUser"];
$email=$_REQUEST["registerEmail"];
$pass=$_REQUEST["registerPassword"];

// Crearem l'usuari amb el mètode registerUser
$usuari->registerUser($user, $email, $pass);
?>