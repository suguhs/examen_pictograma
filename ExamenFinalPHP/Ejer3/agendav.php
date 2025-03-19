<?php
include "conexion.php";
$personas = $conn->query("SELECT id, nombre FROM personas");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Agenda</title>
</head>
<body>
    <h1>Consultar Agenda</h1>
    <form action="mostrar_agenda.php" method="POST">
        <label>Persona:</label>
        <select name="idpersona" required>
            <?php while ($row = $personas->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nombre'] ?></option>
            <?php endwhile; ?>
        </select><br>

        <label>Fecha:</label>
        <input type="date" name="fecha" required><br>

        <button type="submit">Buscar</button>
    </form>
</body>
</html>
