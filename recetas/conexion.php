<?php
$servername = "bluqdr2plrwxi4qowqcx-mysql.services.clever-cloud.com";
$username = "uxieqbhbihmw2foi";
$password = "wURVVqBB1oOmVraD9f2N";
$database = "bluqdr2plrwxi4qowqcx";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>