<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="respostaFormulari.php" method="post">
        <p> Nombre:<input type="text" name="nombre" id="nombre" required placeholder="Introduce un nombre"></p>
        <p> Apellido:<input type="text" name="apellido" id="apellido" required placeholder="Introduce un apellido"></p>
        <p>Profesor<input type="radio" name="situacionLaboral" id="situacionLaboral" value="professor" required> </p>
        <p>Alumno <input type="radio" name="situacionLaboral" id="situacionLaboral" value="alumno"></p>
        <p>Password <input type="password" name="password" id="password" maxlength="4"></p>
        <p>Aficiones:
            Deportes: <input type="checkbox" name="aficiones[]" id="deportes" value="Deportes">
            Videojuegos: <input type="checkbox" name="aficiones[]" id="videojuegos" value="Videojuegos">
            Lectura: <input type="checkbox" name="aficiones[]" id="lectura" value="Lectura">
        </p>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>