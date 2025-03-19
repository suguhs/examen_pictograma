<?php
include "../conexion.php"; // Archivo de conexión a la base de datos

$query = "SELECT imagen FROM pictogramas";
$result = $conn->query($query);

if (!$result) {
    die("Error al obtener pictogramas: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pictogramas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        img {
            width: 80px;
        }
    </style>
</head>

<body>
    <h1>Listado de Pictogramas</h1>
    <table>
        <tr>
            <?php
            $contador = 0;
            while ($row = $result->fetch_assoc()):
                if ($contador % 4 == 0 && $contador != 0) { // Si es múltiplo de 4 y no es la primera imagen
                    echo "</tr><tr>"; // Cerrar fila y abrir nueva cada 4 imágenes
                }
            ?>
                <td>
                    <img src="imagenes/<?= $row['imagen']; ?>" alt="Pictograma"><br>
                    <?= "imagenes/" . $row['imagen']; ?> <!-- Mostrar la ruta de la imagen -->
                    <!-- El = en el interrogacion hace la misma funcion que el echo pero tiene que estar despues de la interrogacion  -->
                    <!--Pero debemos tener cuaidado porque es para consultas faciles ya que si quieres poner mas cosas es mejor poner echo --> 
                </td>
                
            <?php
                $contador++; //cuenta las veces que se ponen las imagenes, cuando va incrementando solo pone un br cuando es multiplo de 4
            endwhile;

            // Si la última fila no está completa, rellenar con celdas vacías
            while ($contador % 4 != 0) {
                echo "<td></td>";
                $contador++;
            }
            ?>
        </tr>
    </table>

</html>