<?php

// Configuración necesaria para acceder a la data base.
$hostname = "localhost";
$usuariodb = "root";
$passworddb = "";
$dbname = "actividad6";
	
// Generando la conexión con el servidor
$conectar = mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);

// Definiendo el charset como utf8
mysqli_set_charset($conectar,"utf8");

?>
