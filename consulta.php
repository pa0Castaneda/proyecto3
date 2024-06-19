<?php
include('conexion.php');

// Manejar búsqueda
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $_POST['search'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Contactos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Contactos</h1>

    <form method="POST" action="consulta.php">
        <input type="text" name="search" placeholder="Buscar por nombre" value="<?php echo $search_query; ?>">
        <button type="submit">Buscar</button>
    </form>

    <ul>
        <?php
        // Actualizar consulta SQL para manejar búsqueda y orden alfabético
        if ($search_query != "") {
            $sql = "SELECT id, nombre, telefono FROM contactos WHERE nombre LIKE '%" . $conn->real_escape_string($search_query) . "%' ORDER BY nombre";
        } else {
            $sql = "SELECT id, nombre, telefono FROM contactos ORDER BY nombre";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "Nombre: " . $row["nombre"] . "<br>";
                echo "Teléfono: " . $row["telefono"] . "<br>";
                echo '<a href="contacto.php?id=' . $row['id'] . '">Ver detalles</a>';
                echo ' | ';
                echo '<a href="editar.php?id=' . $row['id'] . '">Editar</a>';
                echo ' | ';
                echo '<a href="eliminar.php?id=' . $row['id'] . '">Eliminar</a>';
                echo "</li>";
            }
        } else {
            echo "<p>Aún no hay contactos registrados</p>";
        }
        ?>
    </ul>
    
    <a href="index.php"><button type="button">Agregar</button></a>

    <?php
    $conn->close();
    ?>
</body>
</html>
