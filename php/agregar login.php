<?php
session_start();

$host = "localhost";
$db   = "master_finanza";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../login.html");
    exit;
}

$correo     = trim($_POST["correo"] ?? "");
$contrasena = $_POST["contraseña"] ?? "";

if ($correo === "" || $contrasena === "") {
    header("Location: ../login.html?error=campos");
    exit;
}

// Ajusta el nombre de la tabla y las columnas si en tu BD tienen otro nombre
$stmt = $conn->prepare("SELECT usuId, usuNombre, usuCorreo, usuContrasena FROM usuarios WHERE usuCorreo = ? LIMIT 1");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($fila = $resultado->fetch_assoc()) {
    // Soporta contraseñas cifradas con password_hash() o texto plano si aún no usas hash
    $claveValida = password_verify($contrasena, $fila["usuContrasena"]) || ($contrasena === $fila["usuContrasena"]);

    if ($claveValida) {
        session_regenerate_id(true);
        $_SESSION["usuario_id"]     = $fila["usuId"];
        $_SESSION["usuario_nombre"] = $fila["usuNombre"];
        $_SESSION["usuario_correo"] = $fila["usuCorreo"];

        // Cambia a ../página.principal.html si tu archivo tiene tilde
        header("Location: ../pag.principal.html");
        exit;
    }
}

header("Location: ../login.html?error=credenciales");
exit;

