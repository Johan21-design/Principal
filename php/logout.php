
<?php
session_start();

require_once "../conexion.php";

// Verificar que se hayan enviado los datos
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../login.html");
    exit;
}

// Recibir los datos
$correo = trim($_POST["correo"] ?? "");
$contrasena = $_POST["contrasena"] ?? "";

// Validar campos vacíos
if ($correo === "" || $contrasena === "") {
    die("Error: debes completar todos los campos.");
}

// Buscar el usuario en la base de datos
$sql = "SELECT id_usuario, nombre, correo, contrasena
        FROM usuarios
        WHERE correo = ?";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    die("Error al realizar la consulta.");
}

$stmt->bind_param("s", $correo);
$stmt->execute();

$resultado = $stmt->get_result();

// Verificar si existe el usuario
if ($resultado->num_rows === 1) {

    $usuario = $resultado->fetch_assoc();

    // Comprobar la contraseña
    if (password_verify($contrasena, $usuario["contrasena"])) {

        // Crear una nueva sesión segura
        session_regenerate_id(true);

        $_SESSION["id_usuario"] = $usuario["id_usuario"];
        $_SESSION["nombre"] = $usuario["nombre"];
        $_SESSION["correo"] = $usuario["correo"];

        $stmt->close();
        $conexion->close();

        // Entrar a la página principal
        header("Location: ../pag.principal.html");
        exit;

    } else {
        $stmt->close();
        die("Correo o contraseña incorrectos.
             <a href='../login.html'>Volver a intentar</a>");
    }

} else {
    $stmt->close();
    die("Correo o contraseña incorrectos.
         <a href='../login.html'>Volver a intentar</a>");
}

?>

