<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $empresa = $_POST['empresa'];
    $direccion = $_POST['direccion'];
    $relacion = $_POST['relacion'];
    $notas = $_POST['notas'];
    $fecha_nac = $_POST['fecha_nac'];
    $red_social = $_POST['red_social'];
    $numero_sec = $_POST['numero_sec'];

    $sql = "UPDATE contactos SET 
            nombre='$nombre', 
            apellido='$apellido', 
            telefono='$telefono', 
            email='$email', 
            empresa='$empresa', 
            direccion='$direccion', 
            relacion='$relacion', 
            notas='$notas', 
            fecha_nac='$fecha_nac', 
            red_social='$red_social', 
            numero_sec='$numero_sec' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Contacto actualizado correctamente";
    } else {
        echo "Error actualizando contacto: " . $conn->error;
    }

    $conn->close();
    header("Location: consulta.php");
    exit;
}
?>