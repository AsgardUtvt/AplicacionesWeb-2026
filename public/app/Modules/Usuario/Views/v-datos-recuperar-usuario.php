<?php
$email = $_GET['email']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="sytlesheet" href="../usuario/css/usuario-estilo.css" >
</head>
<body>
    <table>
        <tr>
            Correo
        </tr>
        <tr>
            <?php echo $email; ?>
        </tr>
    </table>
</body>
</html>
