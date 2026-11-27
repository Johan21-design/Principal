
<?php
session_start();

require_once "../conexion.php";

// Verificar que el formulario se haya enviado
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../registro.html");
    exit;
}

// Recibir los datos del formulario
$nombre = trim($_POST["nombre"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$contrasena = $_POST["contraseña"] ?? "";
$confirmar = $_POST["confirmar_contraseña"] ?? "";

// Validar campos vacíos
if ($nombre === "" || $correo === "" ||
    $contrasena === "" || $confirmar === "") {
    die("Error: todos los campos son obligatorios.");
}

// Validar el correo electrónico
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Error: el correo electrónico no es válido.");
}

// Verificar que las contraseñas coincidan
if ($contrasena !== $confirmar) {
    die("Error: las contraseñas no coinciden.");
}

// Validar longitud de contraseña
if (strlen($contrasena) < 8) {
    die("Error: la contraseña debe tener mínimo 8 caracteres.");
}

// Verificar si el correo ya existe
$sql = "SELECT id_usuario FROM usuarios WHERE correo = ?";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
}

$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->close();
    die("Error: este correo ya está registrado.");
}

$stmt->close();

// Encriptar la contraseña
$passwordHash = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar el nuevo usuario
$sql = "INSERT INTO usuarios (nombre, correo, contrasena)
        VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
}

$stmt->bind_param("sss", $nombre, $correo, $passwordHash);

if ($stmt->execute()) {
    $stmt->close();
    $conexion->close();

    header("Location: ../login.html?registro=exitoso");
    exit;
} else {
    die("Error al registrar el usuario: " . $stmt->error);
}

?>

