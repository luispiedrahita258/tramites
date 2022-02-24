<?php

// Funcion para cargar la classe automaticamente
function __autoload($class)
{
    require_once(dirname(__FILE__) . "/../class/{$class}.class.php");
}
?>
