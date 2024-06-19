<?php
include('conexion.php');

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$empresa = $_POST["empresa"];
$direccion = $_POST["direccion"];
$relacion = $_POST["relacion"];
$notas = $_POST["notas"];
$fecha_nac = $_POST["fecha_nac"];
$red_social = $_POST["red_social"];
$numero_sec = $_POST["numero_sec"];

$sql = "INSERT INTO contactos (nombre, apellido, telefono, email, empresa, direccion, relacion, notas, fecha_nac, red_social, numero_sec)
        VALUES ('$nombre', '$apellido', '$telefono', '$email', '$empresa', '$direccion', '$relacion', '$notas', '$fecha_nac', '$red_social', '$numero_sec')";

if ($conn->query($sql) === TRUE) {
    echo "Contacto guardado";
    echo '<a href="index.php"><button type="button">Agregar</button></a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

