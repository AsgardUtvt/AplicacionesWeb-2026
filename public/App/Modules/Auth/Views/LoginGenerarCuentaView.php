<?php

use App\Services\ViewService;

$nombre = $_POST['nombre'];
$paterno=$_POST['paterno'];
$materno=$_POST['materno'] ;
$email=$_POST['email'] ;
$password=$_POST['password'] ;
$localidad=$_POST['localidad'];
$colonia=$_POST['colonia'];
$cp=$_POST['codigoPostal'];
$municipio=$_POST['municipio'];
$principalstreet=$_POST['callePrincipal'];
$onestreet=$_POST['calleUno'];
$twostreet=$_POST['calleDos'];
$exteriornum=$_POST['numEx'];
$interiornum=$_POST['numInt'];

if(isset($_POST['generar']))
{
    if(empty(trim($nombre)) || empty(trim($paterno)) ||empty(trim($materno)) ||empty(trim($email)) ||empty(trim($password)) ||empty(trim($localidad)) ||empty(trim($colonia)) ||empty(trim($cp)) ||empty(trim($municipio)) ||empty(trim($principalstreet)) ||empty(trim($onestreet)) ||empty(trim($twostreet)) ||empty(trim($exteriornum)))
    {
        ViewService::soloAlerta("Faltan llenar datos");
    }else{
         r
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar usuario</title>
    <h1>Generar usuario</h1>
</head>
<body>
    <form method="post">
        <h2>Datos de usuario</h2>
        <br>
        <input type="text" placeholder="Nombre" name="nombre" required />
        <br> 
        <input type="text" placeholder="Apellido Paterno" name="paterno" required/>
        <br>
        <input type="text" placeholder="Apellido Materno" name="materno" required/>
        <br>
        <input type="email" placeholder="Correo" name="email" required/>
        <br>
        <input type="password" placeholder="Contraseña" name="password" required/>
        <br>
        <h2>Ubicación</h2>
        <br>
        <input type="text" placeholder="Localidad" name="localidad"/>
        <br>
        <input type="text" placeholder="Colonia" name="colonia"/>
        <br>
        <input type="number" placeholder="Codigo Postal" name="codigoPostal"/>
        <br>
        <input type="text" placeholder="Municipio" name="municipio"/>
        <br>
        <input type="text" placeholder="Calle principal" name="callePrincipal"/>
        <br>
        <label>Entre</label>
        <br>
        <input type="text" placeholder="Calle 1" name="calleUno"/>
        <br>
        <input type="text" placeholder="Calle 2" name="calleDos"/>
        <br>
        <input type="text" placeholder="Numero exterior" name="numEx"/>
        <br>
        <input type="text" placeholder="Numero interior" name="numInt"/>
        <br>
        <input type="submit" value="Generar usuario" id="generarUsuario" name="generar"/>
    </form> 
</body>
</html>
