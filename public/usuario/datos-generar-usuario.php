<?php
$nombre = $_GET['nombre'];
$apPaterno = $_GET['paterno'];
$apMaterno = $_GET['materno'];
$email = $_GET['email'];
$password = $_GET['password'];
$localidad = $_GET['localidad'];
$colonia = $_GET['colonia'];
$codigoPostal = $_GET['codigoPostal'];
$municipio = $_GET['municipio'];
$callePrincipal = $_GET['callePrincipal'];
$calleUno = $_GET['calleUno'];
$calleDos = $_GET['calleDos'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style=" border: 3px solid black; border-color: black; border-collapse: collapse;">
        <tr>
            <td>Nombre</td>
            <td><?php echo $nombre; ?></td>
        </tr>
        <tr>
            <td>Apellido paterno</td>
            <td><?php echo $apPaterno; ?></td>
        </tr>
        <tr>
            <td>Apellido materno</td>
            <td><?php echo $apMaterno; ?></td>
        </tr>
        <tr>
            <td>Correo</td>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><?php echo $password; ?></td>
        </tr>
        <tr>
            <td>Localidad</td>
            <td><?php echo $localidad; ?></td>
        </tr>
        <tr>
            <td>Colonia</td>
            <td><?php echo $colonia; ?></td>
        </tr>
        <tr>
            <td>Cógido postal</td>
            <td><?php echo $codigoPostal; ?></td>
        </tr>
        <tr>
            <td>Municipio</td>
            <td><?php echo $municipio; ?></td>
        </tr>
        <tr>
            <td>Calle principal</td>
            <td><?php echo $callePrincipal; ?></td>
        </tr>
        <tr>
            <td>Calle 1</td>
            <td><?php echo $calleUno; ?></td>
        </tr>
        <tr>
            <td>Calle 2</td>
            <td><?php echo $calleDos; ?></td>
        </tr>
    </table>
</body>
</html>
