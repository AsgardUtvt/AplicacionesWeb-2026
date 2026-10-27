<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos del Proyecto</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&family=ADLaM+Display&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'ABeeZee', sans-serif;
            background-color: #fff9e6;
            margin: 40px;
        }
        h2 {
            font-family: 'ADLaM Display', cursive;
            text-align: center;
            color: #676000;
        }
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            font-family: 'ADLaM Display', cursive;
            border: 1px solid #2e7d32;
            padding: 12px;
            text-align: left;
        }
        th {
            font-family: 'ABeeZee', sans-serif;
            background-color: #4caf50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f9f2;
        }
    </style>
</head>
<body>

    <h2>Datos del Proyecto Ambiental</h2>

    <table>
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor Ingresado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre del Voluntariado</td>
                <td><?php echo htmlspecialchars($_GET['nombre_voluntario'] ?? ''); ?></td>
            </tr>
            <tr>
                <td>Tiempo de Ayuda</td>
                <td><?php echo htmlspecialchars($_GET['tiempo_ayuda'] ?? ''); ?></td>
            </tr>
            <tr>
                <td>Ubicación / Zona</td>
                <td><?php echo htmlspecialchars($_GET['ubicacion'] ?? ''); ?></td>
            </tr>
            <tr>
                <td>Habilidades</td>
                <td><?php echo htmlspecialchars($_GET['habilidades'] ?? ''); ?></td>
            </tr>
            <tr>
                <td>Razón</td>
                <td><?php echo htmlspecialchars($_GET['razon'] ?? ''); ?></td>
            </tr>
        </tbody>
    </table>

</body>
</html>