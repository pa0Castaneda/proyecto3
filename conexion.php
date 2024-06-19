<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "proyec_git";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexion: " . $conn->connect_error);
}
?>
