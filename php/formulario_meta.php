<?php
require_once "conexion.php";

$stmt = $conexion->prepare("SELECT idMeta, metNombre, metMontoObjetivo, metFechaInicio, metFechaFin, metEstado, metImagen FROM meta ORDER BY idMeta DESC");
$stmt->execute();
$resultado = $stmt->get_result();
$metas = $resultado->fetch_all(MYSQLI_ASSOC);

header("Content-Type: application/json; charset=utf-8");
echo json_encode($metas);
?>