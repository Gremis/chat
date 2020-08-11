<?php

$servidor = "localhost";
$usuario = "root";
$password = "test";
$base_datos = "appchat2";


$conexion = new mysqli($servidor, $usuario, $password, $base_datos);
$conexion->query("SET NAMES 'utf8'");

function formatearFecha($fecha){
    return date('g:i a',strtotime($fecha));
}

?>