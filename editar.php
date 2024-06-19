<?php
include('conexion.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contactos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró el contacto.";
        exit;
    }
} else {
    echo "ID de contacto no especificado.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Contacto</h1>
    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
        <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>">
        <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>" required>
        <input type="email" name="email" value="<?php echo $row['email']; ?>">
        <input type="text" name="empresa" value="<?php echo $row['empresa']; ?>">
        <input type="text" name="direccion" value="<?php echo $row['direccion']; ?>">
        <select name="relacion">
            <option value="Sin etiqueta" <?php if($row['relacion'] == 'Sin etiqueta') echo 'selected'; ?>>Sin Etiqueta</option>
            <option value="Herman@" <?php if($row['relacion'] == 'Herman@') echo 'selected'; ?>>Herman@</option>
            <option value="Amigo" <?php if($row['relacion'] == 'Amigo') echo 'selected'; ?>>Amig@</option>
            <option value="Padre" <?php if($row['relacion'] == 'Padre') echo 'selected'; ?>>Padre</option>
            <option value="Madre" <?php if($row['relacion'] == 'Madre') echo 'selected'; ?>>Madre</option>
            <option value="Pareja" <?php if($row['relacion'] == 'Pareja') echo 'selected'; ?>>Pareja</option>
            <option value="Trabajo" <?php if($row['relacion'] == 'Trabajo') echo 'selected'; ?>>Trabajo</option>
            <option value="Otro" <?php if($row['relacion'] == 'Otro') echo 'selected'; ?>>Otro</option>
        </select>
        <textarea name="notas"><?php echo $row['notas']; ?></textarea>
        <input type="date" name="fecha_nac" value="<?php echo $row['fecha_nac']; ?>">
        <input type="text" name="red_social" value="<?php echo $row['red_social']; ?>">
        <input type="text" name="numero_sec" value="<?php echo $row['numero_sec']; ?>">
        <button type="submit">Actualizar contacto</button>
    </form>
</body>
</html>