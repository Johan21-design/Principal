<?php
require_once "conexion.php";

$idMeta = (int)($_GET["idMeta"] ?? 0);

$stmt = $conexion->prepare("SELECT idMeta, metFechaInicio, metFechaFin, metMontoObjetivo, metEstado, metNombre, metImagen, metUsuario FROM meta WHERE idMeta = ? LIMIT 1");
$stmt->bind_param("i", $idMeta);
$stmt->execute();
$resultado = $stmt->get_result();
$meta = $resultado->fetch_assoc();

header("Content-Type: application/json; charset=utf-8");
echo json_encode($meta ?: ["error" => "Meta no encontrada"]);
?>