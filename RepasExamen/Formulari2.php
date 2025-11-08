<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   
    $nom = $_POST["nom"];
    $cognom = $_POST["cognom"];
    $edad = $_POST["edad"];
    $pes = $_POST["pes"];
    $email = $_POST["email"];
    $EstatCivil = $_POST["estatcivil"];

    echo"<p> Nom complet:" . $nom . " ".  $cognom . "</p>";
    echo"<p> Edad: " . $edad ."</p>";
    echo "<p> Pes: " . $pes . "</p>";
    echo "<p> Email: " . $email . "</p>";
    if(isset($_POST["sexe"])){
        $sexo = $_POST["sexe"];
        echo"<p> Sexe: ". $sexo . "</p>";
    }else{
        echo "No has seleccionat cap sexe";
    }

    echo "<p> Estat civil: ". $EstatCivil. "</p>";

    if(isset($_POST["aficions"])){
        $aficiones = $_POST["aficions"];
        foreach($aficiones as $aficion){
            echo "Aficions: ".  $aficion;
        }
    }


    ?>    
</body>
</html>