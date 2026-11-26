<?php
session_start();

require_once "../conexion.php";

// Verificar que el usuario haya iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../index.html");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../metas.html");
    exit;
}

// Recibir los datos del formulario
$id_usuario = $_SESSION['id_usuario'];
$nombre = trim($_POST['metNombre'] ?? '');
$monto = $_POST['metMontoObjetivo'] ?? '';
$fecha_inicio = $_POST['metFechaInicio'] ?? '';
$fecha_fin = $_POST['metFechaFin'] ?? '';
$estado = $_POST['metEstado'] ?? 'En progreso';

// Validar los campos
if (
    $nombre === '' ||
    !is_numeric($monto) ||
    $monto <= 0 ||
    $fecha_inicio === '' ||
    $fecha_fin === ''
) {
    die("Error: verifica que todos los campos estén completos.");
}

if ($fecha_fin < $fecha_inicio) {
    die("Error: la fecha final no puede ser anterior a la fecha de inicio.");
}

if (!in_array($estado, ['En progreso', 'Pendiente'], true)) {
    die("Error: estado no válido.");
}

// Verificar la imagen
if (!isset($_FILES['metImagen']) ||
    $_FILES['metImagen']['error'] !== UPLOAD_ERR_OK) {
    die("Error al subir la imagen.");
}

$archivo = $_FILES['metImagen'];

if ($archivo['size'] > 5 * 1024 * 1024) {
    die("La imagen no puede superar los 5 MB.");
}

// Validar el tipo real de imagen
$finfo = new finfo(FILEINFO_MIME_TYPE);
$tipo = $finfo->file($archivo['tmp_name']);

$tiposPermitidos = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/webp' => 'webp'
];

if (!isset($tiposPermitidos[$tipo])) {
    die("Formato no permitido. Utiliza JPG, PNG o WEBP.");
}

// Crear carpeta para guardar las imágenes
$carpeta = "../uploads/metas/";

if (!is_dir($carpeta)) {
    mkdir($carpeta, 0755, true);
}

// Crear nombre único para la imagen
$nombreImagen = bin2hex(random_bytes(16)) . "." . $tiposPermitidos[$tipo];

$rutaImagen = $carpeta . $nombreImagen;
$rutaBD = "uploads/metas/" . $nombreImagen;

// Mover la imagen a la carpeta
if (!move_uploaded_file($archivo['tmp_name'], $rutaImagen)) {
    die("No se pudo guardar la imagen.");
}

// Guardar la meta en MySQL
$sql = "INSERT INTO metas
        (id_usuario, nombre, monto_objetivo, monto_ahorrado,
         imagen, fecha_inicio, fecha_limite, estado)
        VALUES (?, ?, ?, 0, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    unlink($rutaImagen);
    die("Error al preparar la consulta: " . $conexion->error);
}

$stmt->bind_param(
    "isdssss",
    $id_usuario,
    $nombre,
    $monto,
    $rutaBD,
    $fecha_inicio,
    $fecha_fin,
    $estado
);

if ($stmt->execute()) {
    $stmt->close();
    $conexion->close();

    header("Location: ../metas.html?registro=exitoso");
    exit;
} else {
    unlink($rutaImagen);
    die("Error al guardar la meta: " . $stmt->error);
}
?>
