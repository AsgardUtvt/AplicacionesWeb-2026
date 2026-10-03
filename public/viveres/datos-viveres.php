<?php
$nombre = $_GET['nombre'];
$tipo = $_GET['tipo'];
$cantidad = $_GET['cantidad'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr> 
            <td>Nombre</td>
            <td> <?php echo $nombre; ?></td>
        </tr>
        <tr> 
            <td>Tipo</td>
            <td> <?php echo $tipo; ?></td>
        </tr>
        <tr> 
            <td>Cantidad</td>
            <td> <?php echo $cantidad; ?></td>
        </tr>
    </table>
</body>
</html>
