<?php
include('conexion.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contactos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Contacto eliminado correctamente";
    } else {
        echo "Error eliminando contacto: " . $conn->error;
    }

    $conn->close();
    header("Location: consulta.php");
    exit;
} else {
    echo "ID de contacto no especificado.";
    exit;
}
?>