<?php
include('conexion.php');

// Variable para el mensaje de confirmación
$contacto_guardado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $sql = "INSERT INTO contactos (nombre, apellido, telefono, email, empresa, direccion, relacion, notas, fecha_nac, red_social, numero_sec) VALUES ('$nombre', '$apellido', '$telefono', '$email', '$empresa', '$direccion', '$relacion', '$notas', '$fecha_nac', '$red_social', '$numero_sec')";

    if ($conn->query($sql) === TRUE) {
        $contacto_guardado = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Agenda de Contactos</h1>

    <?php if ($contacto_guardado): ?>
        <p>Contacto guardado</p>
        <a href="consulta.php"><button type="button">Consultar Contactos</button></a>
    <?php else: ?>
        <form action="index.php" method="POST">
            Nombre:<br>
            <input type="text" name="nombre" required>
            Apellido:<br>
            <input type="text" name="apellido">
            Telefono:<br>
            <input type="text" name="telefono" required>
            Email:<br>
            <input type="email" name="email">
            Empresa:<br>
            <input type="text" name="empresa">
            Dirección:<br>
            <input type="text" name="direccion">
            Relación:<br>
            <select name="relacion">
                <option value="Sin etiqueta">Sin Etiqueta</option>
                <option value="Herman@">Herman@</option>
                <option value="Amigo">Amig@</option>
                <option value="Padre">Padre</option>
                <option value="Madre">Madre</option>
                <option value="Pareja">Pareja</option>
                <option value="Trabajo">Trabajo</option>
                <option value="Otro">Otro</option>
            </select>
            Notas:<br>
            <textarea name="notas"></textarea>
            Fecha de nacimiento:<br>
            <input type="date" name="fecha_nac">
            Red social:<br>
            <input type="text" name="red_social">
            Número secundario:<br>
            <input type="text" name="numero_sec">
            <button type="submit">Guardar contacto</button> 
            <a href="consulta.php"><button type="button">Cancelar</button></a>
        </form>
    <?php endif; ?>
</body>
</html>
