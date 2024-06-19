<?php
include('conexion.php');

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM contactos WHERE id=$id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el contacto";
        exit;
    }
} else {
    echo "ID de contacto no especificado";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Detalles del Contacto</h1>
    <ul>
        <li>Nombre: <?php echo $row['nombre']; ?></li>
        <li>Apellido: <?php echo $row['apellido']; ?></li>
        <li>Teléfono: <?php echo $row['telefono']; ?></li>
        <li>Email: <?php echo $row['email']; ?></li>
        <li>Empresa: <?php echo $row['empresa']; ?></li>
        <li>Dirección: <?php echo $row['direccion']; ?></li>
        <li>Relación: <?php echo $row['relacion']; ?></li>
        <li>Notas: <?php echo $row['notas']; ?></li>
        <li>Fecha de Nacimiento: <?php echo $row['fecha_nac']; ?></li>
        <li>Red Social: <?php echo $row['red_social']; ?></li>
        <li>Número Secundario: <?php echo $row['numero_sec']; ?></li>
    </ul>

    <a href="consulta.php"><button type="button">Volver</button></a>
</body>
</html>
