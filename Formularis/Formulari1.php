<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if (!isset($_POST["enviar"])) {
    ?>

    <form action="respostaFormulari.php" method="post">
    <p>
        <label>
            Nombre: <input type="text" name="nombre" id="nombre" required placeholder="Introduce un numbre">
        </label>
        </p>        
        <p>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" required placeholder="Introduce un apellido">
        </p>

        <p>Profesor <input type="radio" name="situacionLaboral" id="situacionLaboral" value="professor"></p>
        <p>Alumno <input type="radio" name="situacionLaboral" id="situacionLaboral" value="alumno"></p>
        <p>Password <input type ="password" name="password" id="password" maxlength="5"></p>
        <p>Aficiones: </p>
        <p>
            <select name="aficiones[]" id="aficiones" multiple>
                <option value="Deportes">Deportes</option>
                <option value="Videojuegos">Videojuegos</option>
                <option value="Lectura">Lectura</option>
            </select>
        </p>
        <!--p>
            Deportes: <input type="checkbox" name="aficiones[]" id="deportes" value="Deportes">
            Videojuegos: <input type="checkbox" name="aficiones[]" id="videojuegos" value="Videojuegos">
            Lectura: <input type="checkbox" name="aficiones[]" id="lectura" value="Lectura">
        </p> --> 
        
        <p>
            <textarea name="comentarios" id="comentarios" cols="30" rows="10" placeholder="Comentarios..."></textarea>
        </p>
        <input type="hidden" name="apodo" value="Profe molon">
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>

    <!--<input type ="submit"> és un boton textual
    <button type ="submit"> se puede modificar, para añadir una imagen o lo que sea para cambiarlo-->

    <?php
    // PART QUE ANIRIA A LA RESPOSTAFORMULARI.PHP
    } else {
        if (isset($_POST["enviar"])) {
            $profe = $_POST["nombre"]; //$_REQUEST puede ser utilizada si no se sabe como se enviaran los datos
            $cognomProfe = $_POST["apellido"];
            echo "<h1>Benvingut $profe $cognomProfe a la resposta del post.</h1>";

            if (isset($_POST["situacionLaboral"])) {
                if ($_POST["situacionLaboral"] == "profesor") {
                    $rol = "es un profe";
                } else if ($_POST["situacionLaboral"] == "alumno") {
                    $rol = "es un alumno";
                }
            } else {
                $rol = "ni es profe ni alumno";
            }

            echo "<h2>$profe $cognomProfe $rol</h2>";

            echo "<h3>Aficiones</h3>";
            if (isset($_POST["aficiones"])) {
                echo "<ul>";
                $aficiones = $_POST["aficiones"];
                foreach ($aficiones as $aficion) {
                    echo "<li>$aficion</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>$profe $cognomProfe no tiene aficiones</p>";
            }
            /*if ($_POST["deportes"]){
                echo "<li>Deportes</li>";
            }
            if ($_POST["videojuegos"]){
                echo "<li>videojuegos</li>";
            }
            if ($_POST["lectura"]){
                echo "<li>lectura</li>";
            }*/
            echo "</ul>";
            echo $_GET["apodo"];
        }
    }
    ?>

</body>
</html>