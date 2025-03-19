<?php
include "../conexion.php";

$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$idpersona = $_POST['idpersona'];
$idimagen = $_POST['idimagen'];

$sql = "INSERT INTO agenda (fecha, hora, idpersona, idimagen) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $fecha, $hora, $idpersona, $idimagen); // s: string, i: integer

if ($stmt->execute()) {
    echo "Registro insertado correctamente. <a href='insertar_agenda.php'>Volver</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
