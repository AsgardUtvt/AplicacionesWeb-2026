<?php 
$nombre = $datos_usuario['usuario_name'];
$paterno = $datos_usuario['usuario_paterno'];
$materno = $datos_usuario['usuario_materno'];
$correo = $datos_usuario['usuario_correo'];
$localidad = $datos_usuario['usuario_localidad'];
$colonia = $datos_usuario['usuario_colonia'];
$cp = $datos_usuario['usuario_cp'];
$municipio = $datos_usuario['usuario_municipio'];
$calle_prin = $datos_usuario['usuario_calle_principal'];
$calle_izq = $datos_usuario['usuario_calle_izquierda']; 
$cadlle_der = $datos_usuario['usuario_calle_derecha'];
$num_ex = $datos_usuario['usuario_num_exterior']; 
$num_int = $datos_usuario['usuario_num_interior'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1> Usuario <?= $nombre. " ". $paterno. " ".$materno; ?> generardo  con exito</h1>
<p> Hola <?=  $nombre ?> bienvenido al Un Grano De Mostaza, tus datos son los siguientes</p>
<ul>
    <li> Correo: <?= $correo; ?> </li>
  <li>Localidad:  <?= $localidad;?> </li>
  <li>Colonia: <?= $colonia;?> </li>
  <li>Codigo Postal: <?= $cp; ?> </li>
  <li>Municipio: <?= $municipio;?> </li>
  <li>Calle principal: <?= $calle_prin;?> </li>
  <li>Calle izquierda: <?= $calle_izq;?> </li>
  <li>Calle derecha: <?= $cadlle_der;?> </li>
  <li>Numero exetrior: <?= $num_ex;?> </li>
  <li>Numero interior:  <?= $num_int;?> </li>
</ul>
</body>
</html>
