<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restauración Ambiental</title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style-general.css">

</head>
<body style="background-color: #fff9e3;margin: 40px;">

    <h2>Datos del proyecto ambiental</h2>

    <div class="container">
        <table class="table">
            <threat>
                <tr>
                    <th>Campo</th>
                    <th>Valor Ingresado</th>
                </tr>
            </threat>
            <tbody>
                <tr>
                    <td><strong>Nombre del Proyecto</strong></td>
                    <td><?php echo htmlspecialchars($_GET['nombre_proyecto'] ?? 'No especificado.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Tipo de Ecosistema</strong></td>
                    <td><?php echo htmlspecialchars($_GET['tipo_ecosistema'] ?? 'No especificado.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Ubicación<strong></td>
                    <td><?php echo htmlspecialchars($_GET['ubicacion'] ?? 'No especificado.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Meta de Árboles / Plantas<strong></td>
                    <td><?php echo htmlspecialchars($_GET['arboles_meta'] ?? 'No especificado.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Fecha de Inicio<strong><td>
                    <td><?php echo htmlspecialchars($_GET['fecha_inicio'] ?? 'No especificado.'); ?><td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
