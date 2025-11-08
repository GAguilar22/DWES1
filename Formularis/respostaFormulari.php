<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

    $nomprofe = $_POST["nombre"];
    $cognomprofe = $_POST["apellido"];
    $situacionLaboral = "ni és profe ni alumno";

    // Si la variable del formulario situacioLaboral s'ha marcat
    // La variable entrarà aqui si es marca la opció de profe/alumne
    // Ja que no hem posat el "required" al formulari i per tant no és un camp obligatori
    if(isset($_POST["situacionLaboral"])){

        if($_POST["situacionLaboral"] == "professor"){
            $situacionLaboral = "és un profe";
        }elseif($_POST["situacionLaboral"] == "alumno"){
            $situacionLaboral = "és un alumno";
        }
    }

    echo "<h1> Benvingut $nomprofe $cognomprofe a la pagina de resposta Post</h1>";
    echo "<h2>$nomprofe $cognomprofe $situacionLaboral</h2>";

    echo "<h3> Aficiones</h3>";

    if(isset($_POST["aficiones"])){
        $aficiones = $_POST["aficiones"];
        
        echo "<ul>";
        foreach($aficiones as $aficion){
            echo "<li>$aficion</li>";
        }
        echo"</ul";
        
    }else{
        echo"<p> No tiene aficiones el triste </p>";
    }

    echo "<p> El apodo del profe es:" . $_POST["apodo"] . "</p>";
    echo "<p> Comentarios:</p>";
    echo "<p>" . $_POST["comentarios"] . "</p>";

   
    //Si no fessim un foreach, hauriem de posar un if per cada possibilitat

    /*if($_POST["deportes"]){
        echo "<li>Deportes</li>;
    }
    if($_POST["videojuegos"]){
        echo "<li>Videojuegos</li>;
    }
    if($_POST["lectura"]){
        echo "<li>Lectura</li>;  */
        

    ?>

</body>
</html>