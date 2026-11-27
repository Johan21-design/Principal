<?php
session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idUsuario = (int)($_SESSION["idUsuario"] ?? $_POST["idUsuario"] ?? 1);
    $nombre = trim($_POST["metNombre"] ?? "");
    $montoObjetivo = (int)($_POST["metMontoObjetivo"] ?? 0);
    $fechaInicio = $_POST["metFechaInicio"] ?? date("Y-m-d");
    $fechaFin = $_POST["metFechaFin"] ?? date("Y-m-d");
    $estado = trim($_POST["metEstado"] ?? "En progreso");
    $imagen = trim($_POST["metImagen"] ?? "img/metas/default.jpg");

    $stmt = $conexion->prepare("INSERT INTO meta (metFechaInicio, metFechaFin, metMontoObjetivo, metEstado, metNombre, metImagen, metUsuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssi", $fechaInicio, $fechaFin, $montoObjetivo, $estado, $nombre, $imagen, $idUsuario);

    if ($stmt->execute()) {
        header("Location: ../metas.html");
        exit;
    }

    echo "Error al crear la meta: " . $conexion->error;
}
?>