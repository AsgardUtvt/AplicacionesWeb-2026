<!--  
| donacion_name         | varchar(150)  | NO   | MUL | Titulo de donación no definido         |                |
| donacion_objetivo     | varchar(500)  | NO   |     | Objetivo no definido                   |                |
| donacion_fecha_inicio | datetime      | NO   |     | @`TIMESTAMP`                           |                |
| donacion_fecha_fin    | datetime      | NO   |     | NULL                                   |                |
| donacion_meta    
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Esto es para generar una donacion</h1>
    <form action="menu_genear_donacion" method="post">
        <br>
        <label>Titulo</label> 
        <input type="text" name="" placeholder="" required/>
        <br>
        <label>Meta</label> 
        <input type="number" name="" placeholder="" min="0" max="9999999999999"  required/>
        <br>
        <label>Objetivo</label> 
        <textarea></textarea>
        <br>
        <label>Imagen</label> 
        <input type="file" name="" placeholder="" accept="image/*" required/>
        <br>
        <label>Inicio</label> 
        <input type="datetime-local" name="" placeholder="" />
        <br>
        <label>Fin</label> 
        <input type="datetime-local" name="" placeholder="" />
        <br>
        <input type="submit" name="" placeholder="Generar donacion" />
    </form>
</body>
</html>
