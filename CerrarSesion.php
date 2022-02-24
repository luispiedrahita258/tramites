<?php
// Declaramos en fichero encargado de realizar la conexión
require_once('db/conexion.php');
require_once('db/clase.php');
// Instancia el objeto da classe Login
$objLogin = new Login();

// Finaliza la sessión del usuario
$objLogin->logout('index.php');
?>
