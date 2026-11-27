<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idMeta = (int)($_POST["idMeta"] ?? 0);
    $nombre = trim($_POST["metNombre"] ?? "");
    $montoObjetivo = (int)($_POST["metMontoObjetivo"] ?? 0);
    $fechaInicio = $_POST["metFechaInicio"] ?? date("Y-m-d");
    $fechaFin = $_POST["metFechaFin"] ?? date("Y-m-d");
    $estado = trim($_POST["metEstado"] ?? "En progreso");

    $stmt = $conexion->prepare("UPDATE meta SET metNombre = ?, metMontoObjetivo = ?, metFechaInicio = ?, metFechaFin = ?, metEstado = ? WHERE idMeta = ?");
    $stmt->bind_param("sisssi", $nombre, $montoObjetivo, $fechaInicio, $fechaFin, $estado, $idMeta);

    if ($stmt->execute()) {
        header("Location: ../metas.html");
        exit;
    }

    echo "Error al actualizar la meta: " . $conexion->error;
}
?>