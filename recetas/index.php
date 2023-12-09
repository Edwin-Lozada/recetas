<?php
session_start();
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password_hash FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password_hash'];

        // Verificar la contraseña ingresada con el hash almacenado en la base de datos
        if (password_verify($password, $hashed_password)) {
            $_SESSION['usuario_id'] = $row['id'];
            header("Location: perfil.php"); // Redirigir al perfil del usuario
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.7">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
<div id="content">
<div id="content2">
            <header>
                <h1>Cocina Creativa Online</h1>
            </header>
        </div>
    <div id="content5">
        <h2>Iniciar Sesión</h2>
        <form method="post">
            <!-- Campos del formulario para iniciar sesión -->
            <input type="text" name="username" placeholder="Nombre de Usuario" required><br><br>
            <input type="password" name="password" placeholder="Contraseña" required><br><br>
            <input type="submit" value="Iniciar Sesión"> <br><br>
        ¿No tienes una cuenta? <a href="registro.php">Registrate aqui</a>
        </form><br>
    </div>
    </div>
</body>
</html>
