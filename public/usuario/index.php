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
    <form action="" method="post">
        <h2>Datos de usuario</h2>
        <br>
        <input type="text" placeholder="Nombre" id="nombre" required />
        <br> 
        <input type="text" placeholder="Apellido Paterno" id="paterno" required/>
        <br>
        <input type="text" placeholder="Apellido Materno" id="materno" required/>
        <br>
        <input type="email" placeholder="Correo" id="email" required/>
        <br>
        <input type="password" placeholder="Contraseña" id="password" required/>
        <br>
        <h2>Ubicación</h2>
        <br>
        <input type="text" placeholder="Localidad" id="localidad"/>
        <br>
        <input type="text" placeholder="Colonia" id="colonia"/>
        <br>
        <input type="number" placeholder="Codigo Postal" id="codigoPostal"/>
        <br>
        <input type="text" placeholder="Municipio" id="municipio"/>
        <br>
        <input type="text" placeholder="Calle principal" id="callePrincipal"/>
        <br>
        <label>Entre</label>
        <br>
        <input type="text" placeholder="Calle 1" id="calleUno"/>
        <br>
        <input type="text" placeholder="Calle 2" id="calleDos"/>
        <br>
        <input type="submit" value="Generar usuario" id="generarUsuario"/>
    </form> 
</body>
</html>
