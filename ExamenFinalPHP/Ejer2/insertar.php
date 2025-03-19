<?php
include "../conexion.php";

// Obtener personas
$personas = $conn->query("SELECT id, nombre FROM personas");

// Obtener pictogramas
$pictogramas = $conn->query("SELECT id, imagen FROM pictogramas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar en Agenda</title>
</head>
<body>
    <h1>Agregar Entrada a la Agenda</h1>
    <form action="procesar_agenda.php" method="POST">
        <label>Fecha:</label>
        <input type="date" name="fecha" required><br>

        <label>Hora:</label>
        <input type="time" name="hora" required><br>

        <label>Persona:</label>
        <select name="idpersona" required>
            <?php while ($row = $personas->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
            <?php endwhile; ?>
        </select><br>

        <label>Pictograma:</label><br>
        <?php while ($row = $pictogramas->fetch_assoc()): ?>
            <input type="radio" name="idimagen" value="<?= $row['id'] ?>" required>
            <img src="imagenes/<?= $row['imagen'] ?>" width="50"><br>
        <?php endwhile; ?>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
