    <<<<<<< HEAD

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Master Finance</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #000;
    color: #fff;
}

/* ENCABEZADO */
header {
    width: 100%;
    min-height: 85px;
    background: #000;
    display: flex;
    align-items: center;
    padding: 10px 30px;
    box-shadow: 0 2px 8px rgba(0,0,0,.3);
    gap: 12px;
}

.logo {
    width: 55px;
    height: 55px;
    object-fit: contain;
}

.logo-nombre {
    color: white;
    font-size: 23px;
    font-weight: bold;
    text-decoration: none;
    white-space: nowrap;
}

.logo-nombre span {
    color: #ed1c24;
}

/* BARRA DE NAVEGACIÓN */
nav {
    background: #111;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    padding: 12px 15px;
    gap: 10px;
}

nav a {
    color: white;
    text-decoration: none;
    padding: 12px 20px;
    border-radius: 6px;
    font-size: 15px;
    transition: .3s;
}

nav a:hover {
    background: #ed1c24;
}

/* CONTENIDO PRINCIPAL */
main {
    min-height: calc(100vh - 140px);
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 40px 20px;
}

.bienvenida {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.bienvenida img {
    width: 300px;
    max-width: 80%;
    height: auto;
    margin-bottom: 25px;
    border-radius: 15px;
}

.bienvenida h2 {
    font-size: 32px;
    color: #fff;
    margin-bottom: 15px;
}

.bienvenida h2 span {
    color: #ed1c24;
}

.bienvenida p {
    font-size: 18px;
    color: #ccc;
    margin-bottom: 30px;
}

/* BOTONES */
.botones a {
    display: block;
    width: 220px;
    padding: 14px;
    margin: 10px auto;
    background: #ed1c24;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: .3s;
}

.botones a:hover {
    background: #a90008;
    transform: translateY(-3px);
}

/* DISEÑO PARA CELULARES */
@media(max-width:768px) {
    header {
        justify-content: center;
        padding: 12px;
    }

    .logo {
        width: 45px;
        height: 45px;
    }

    .logo-nombre {
        font-size: 19px;
    }

    nav {
        gap: 5px;
    }

    nav a {
        padding: 10px 12px;
        font-size: 13px;
    }

    .bienvenida h2 {
        font-size: 25px;
    }

    .bienvenida img {
        width: 230px;
    }
}
</style>
</head>

<body>

<header>
    <a href="index.html">
        <img class="logo"
        src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABOagAwAEAAAAAQAABOYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAAAOEJJTQQlAAAAAAAQ1B2M2Y8AsgTpgAmY7PhCfv/AABEIBOYE5gMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba4ubq8vP09fb3+Pn6/9k="
        alt="Logo Master Finance">
    </a>

    <a href="index.html" class="logo-nombre">
        MASTER <span>FINANCE</span>
    </a>
</header>

<nav>
    <a href="ingresos.html">Ingresos</a>
    <a href="gastos.html">Gastos</a>
    <a href="ahorros.html">Ahorros</a>
    <a href="metas.html">Metas</a>
    <a href="presupuesto.html">Presupuesto</a>
    <a href="#">Reportes</a>
</nav>

<main>
    <section class="bienvenida">

        <img
        src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABOagAwAEAAAAAQAABOYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAAAOEJJTQQlAAAAAAAQ1B2M2Y8AsgTpgAmY7PhCfv/AABEIBOYE5gMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba4ubq8vP09fb3+Pn6/9k="
        alt="Logo Master Finance">

        <h2>
            Bienvenido a <span>Master Finance</span>
        </h2>

        <p>¿Por dónde quieres empezar hoy?</p>

        <div class="botones">
            <a href="ingresos.html">Registra tus ingresos</a>
            <a href="gastos.html">Registra tus gastos</a>
        </div>

    </section>
</main>

</body>
</html>

=======
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
>>>>>>> origin/Elvis
