<?php

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
    <form action="datos-generar-usuario.php" method="get">
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
        <input type="submit" value="Generar usuario" id="generarUsuario"/>
    </form> 
</body>
</html>
