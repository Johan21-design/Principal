<?php

// Datos de conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "Master_finance";

// Crear conexión
$conexion = new mysqli(
    $servidor,
    $usuario,
    $password,
    $baseDatos
);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar caracteres
$conexion->set_charset("utf8mb4");

echo "Conexión exitosa a MySQL";

?>