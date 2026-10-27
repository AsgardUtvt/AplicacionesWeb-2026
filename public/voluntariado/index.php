<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Un Grano de Mostaza - Restauración Ambiental</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&family=ADLaM+Display&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'ABeeZee', sans-serif;
            background-color: #fff9e6;
            color: #676000;
            margin: 40px;
        }
        .header-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 15px;
        }
        h2 { font-family: 'ADLaM Display', cursive; text-align: center; color: #504a05; }
        label { display: block; margin-top: 10px; font-weight: bold; color: #333; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button {
            font-family: 'ABeeZee', sans-serif;
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #b2ef61;
            color: #6a6200;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover { background-color: #f0e01e; }
    </style>
</head>
<body>
    <div class="card">
        <img src="https://blog.monex.com.mx/hs-fs/hubfs/Imported_Blog_Media/Las-campanas-de-voluntariado-mas-exitosas-del-mundo.jpg?width=600&name=Las-campanas-de-voluntariado-mas-exitosas-del-mundo.jpg">
        <h2>Postulación de Voluntariado.</h2>
        <form action="lista_voluntariado.php" method="GET">
            <label for="nombre_voluntario">1. Nombre Completo:</label>
            <input type="text" id="nombre_voluntario" name="nombre_voluntario" required>

            <label for="tiempo_ayuda">2. Tiempo de ayuda</label>
            <select id="tiempo_ayuda" name="tiempo_ayuda">
                <option value="1hora">1 HORA</option>
                <option value="2horas">2 HORAS</option>
                <option value="m2horas">MÁS DE 2 HORAS</option>
                <option value="todo el dia">TODO EL DÍA</option>
            </select>

            <label for="ubicacion">3. Ubicación / Zona:</label>
            <input type="text" id="ubicacion" name="ubicacion" required>

            <label for="habilidades">4. Habilidades:</label>
            <input type="text" id="habilidades" name="habilidades" required>

            <label for="fecha_inicio">5. Razón de postulación (Breve descripción):</label>
            <input type="text" id="razon" name="razon" required>

            <button type="submit">Enviar Datos</button>
        </form>
    </div>
</body>
</html>