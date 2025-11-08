<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombre = $_POST["nombre"];
    $cognomProfe = $_POST["apellido"];
    $situacionLaboral = "ni profe ni alumne";

    // Si la variable del formulari situacio laboral s'hamarcat 
    if (isset($_POST["situacionLaboral"])) {
        if ($_POST["situacionLaboral"] == "professor"){
            $situacionLaboral = "Es un profe";
        }else {
            $situacionLaboral = "Es un alumne";
        } 
    }
    echo "<h1>Benvingut $nombre $cognomProfe a la pagina de resposta post</h1>";
    echo "<h2>$nombre $cognomProfe $situacionLaboral</h2>";

    echo "<h3>Aficiones</h3>";
   
    if (isset($_POST["aficiones"])){
        echo "<ul>";
        $aficiones =$_POST["aficiones"];
        foreach ($aficiones as $aficion) {
            echo "<li>$aficion</li>";
        }
         echo "</ul>";
    } else {
        echo "No tiene aficiones el triste";
    }
  
    ?>
</body>
</html>