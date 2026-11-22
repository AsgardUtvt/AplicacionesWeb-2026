<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un Grano de Mostaza - Restauración Ambiental</title>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style-general.css">
   
    <style>
        body {
            background-color: #fff9e3;
            color: #676000;
            margin: 40px;
        }
        .card-proyecto {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .header-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        h2 {
            text-align: center;
            color: #504a05;
            margin-bottom: 25px;
        }
        select {
            width: 100%;
            padding: 14px 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #7a7a7a;
            border-radius: 5px;
            background-color: transparent;
            font-size: 16px;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="card-proyecto">
        <img src="https://www.iies.unam.mx/laboratorios/restauracion-ambiental/wp-content/uploads/2018/09/green-beautiful-mexico-nature-serene-jungle-waterfall-best-hd-wallpaper-luxury-hd-wallpaper-beautiful-natural-waterfall-of-green-beautiful-mexico-nature-serene-jungle-waterfall-best-hd-wallp.jpg" alt="Restauración Ambiental" class="header-img">

        <h2>Registro de Proyecto Ambiental</h2>

        <form action="procesar_restauracion.php" method="GET">
 
            <div class="input-contenedor input-outline" style="width: 100%;">
                <input type="text" id="nombre_proyecto" name="nombre_proyecto" placeholder=" " required>
                <label for="nombre_proyecto">1. Nombre del Proyecto</label>
            </div>

            <label for="tipo_ecosistema" style="font-weight: bold; font-size: 14px; color: #556b2f;">2. Tipo de Ecosistema:</label>
            <select id="tipo_ecosistema" name="tipo_ecosistema">
                <option value="Bosque">Bosque</option>
                <option value="Río / Cuenca">Río / Cuenca</option>
                <option value="Urbano / Parque">Urbano / Parque</option>
                <option value="Zona Agrícola">Zona Agrícola</option>
            </select>

            <div class="input-contenedor input-outline" style="width: 100%;">
                <input type="text" id="ubicacion" name="ubicacion" placeholder=" " required>
                <label for="ubicacion">3. Ubicación / Zona</label>
            </div>

            <div class="input-contenedor input-outline" style="width: 100%;">
                <input type="number" id="arboles_meta" name="arboles_meta" min="1" placeholder=" " required>
                <label for="arboles_meta">4. Meta de Árboles / Plantas</label>
            </div>

            <label for="fecha_inicio" 
                style="font-weight: bold; font-size: 14px; color: #556b2f; display: block; margin-top: 10px;">
                5. Fecha de Inicio Estimada:
            </label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" 
                    style="width: 100%; padding: 12px; margin-top: 5px; margin-bottom: 20px; 
                          border: 1px solid #7a7a7a; border-radius: 5px; box-sizing: border-box; 
                          font-family: 'beezee', sans-serif;" required>

            <button type="submit" style="width: 100%;"> Enviar </button>
        </form>
    </div>
</body>
</html>
