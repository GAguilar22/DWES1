<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    
    $nom = $_POST["nombre"];
    $cognom = $_POST["apellido"];
    $edat = $_POST["edad"];
    $adreca = $_POST["direccio"];
    $telefon = $_POST["telefon"];
    $mail = $_POST["email"];
    $color = $_POST["color"];

    


    echo "<h1> Formulari Contacte Alumne </h1>";

    

    echo"<p><strong> Nom de l'alumne</strong>  $nom $cognom </p>";
    echo "<p><strong> Edat:</strong> $edat</p>";
    echo "<p><strong> Direcció:</strong> $adreca</p>";
    echo "<p><strong> Telèfon:</strong> $telefon </p>";
    echo "<p><strong> Email:</strong> $mail </p>";
    echo "<p><strong> Color preferit:</strong> $color </p>";

    
    
    if(isset($_POST["provincies"])){
        $provincies = $_POST["provincies"];

        foreach($provincies as $provincia){
            echo "<p><strong> Provincia: </strong> $provincia </p>";
        }

    }else{
        echo "No has seleccionat cap provincia";
    }


    if(isset($_POST["cicles"])){
        $cicles = $_POST["cicles"];

        foreach($cicles as $cicle){
            echo "<p><strong>Esta cursant:</strong> $cicle </p>";
        }
    }

    if(isset($_POST["estatcivil"])){
        $estatcivil = $_POST["estatcivil"];
        switch($estatcivil){
            case "solter";
            echo "<p><strong>Estat civil:</strong> solter </p>";
            break;
            
            case "casat";
            echo "<p><strong>Estat civil:</strong> casat </p>";
            break;

            case "viudo";
            echo "<p><strong>Estat civil:</strong> viudo </p>";
            break;

            case "separat";
            echo "<p><strong>Estat civil:</strong> separat </p>";
            break;
            
        }
    }

    if(isset($_POST["estudiant"]) && isset($_POST["treballant"])){
        echo "<p><strong> Estat professional: </strong> Estudiant i treballant";
    }elseif(isset($_POST["estudiant"])){
        echo "<p><strong> Estat professional: </strong> Estudiant";
    }elseif(isset($_POST["treballant"])){
        echo "<p><strong> Estat professional:</strong> Treballant";
    }
    
    ?>

    
</body>
</html>