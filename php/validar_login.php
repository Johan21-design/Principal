<?php
session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = trim($_POST["correo"] ?? "");
    $contrasena = $_POST["contrasena"] ?? "";

    $stmt = $conexion->prepare("SELECT idUsuario, usuNombre, usuApellido, usuContraseña, usuAdministrador FROM usuario WHERE usuCorreo = ? LIMIT 1");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        if ($contrasena === $fila["usuContraseña"] || password_verify($contrasena, $fila["usuContraseña"])) {
            $_SESSION["idUsuario"] = $fila["idUsuario"];
            $_SESSION["usuNombre"] = $fila["usuNombre"];
            $_SESSION["usuApellido"] = $fila["usuApellido"];
            $_SESSION["usuAdministrador"] = $fila["usuAdministrador"];
            header("Location: ../pag.principal.html");
            exit;
        }
    }

    echo "Correo o contraseña incorrectos.";
}
?>