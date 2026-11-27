<?php
session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idUsuario = (int)($_SESSION["idUsuario"] ?? $_POST["idUsuario"] ?? 1);
    $fecha = $_POST["ahorFecha"] ?? date("Y-m-d");
    $monto = (int)($_POST["ahorMonto"] ?? 0);

    $stmt = $conexion->prepare("INSERT INTO ahorro (ahorFecha, ahorMonto, ahorUsuario) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $fecha, $monto, $idUsuario);

    if ($stmt->execute()) {
        header("Location: ../ahorros.html");
        exit;
    }

    echo "Error al guardar el ahorro: " . $conexion->error;
}
?>