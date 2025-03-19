<?php
include "../conexion.php";

$idpersona = $_POST['idpersona'];
$fecha = $_POST['fecha'];

$query = "
    SELECT pictogramas.imagen, agenda.fecha, agenda.hora
    FROM agenda
    JOIN pictogramas ON agenda.idimagen = pictogramas.id 
    WHERE agenda.idpersona = ? AND agenda.fecha = ?
";//selecciona la imagen, la fecha y la hora de la agenda donde el id de la persona sea igual al id de la persona seleccionada y
// la fecha sea igual a la fecha seleccionada
//el join es para unir las tablas de agenda y pictogramas para poder seleccionar la imagen
//que nos perimitira mostrarla en la tabla porque si no hacemos el join no nos cogeria la imagen    

$stmt = $conn->prepare($query);
$stmt->bind_param("is", $idpersona, $fecha); 
$stmt->execute();
$result = $stmt->get_result(); //obtiene el resultado de la consulta
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda del Día</title>
</head>
<body>
    <h1>Agenda del Día</h1>
    <table>
        <tr><th>Imagen</th><th>Fecha</th><th>Hora</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><img src="imagenes/<?= $row['imagen'] ?>" width="50"></td>
                <td><?= $row['fecha'] ?></td>
                <td><?= $row['hora'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

