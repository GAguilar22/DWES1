<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $nom = array("Didac", "Carles", "Youssef", "Eduard", "Jesus",
            "Cognom1" => array("Jimenez", "Lara", "Ghaddari", "Sorita", "Silva",
            "Cognom2"=> array("Monedero", "Jimenes", "Lopez", "Dominguez", "Esquinas")
                ));

        foreach($nom as $nom1 => $nombre){
            echo "<p> $nombre </p>";
            if($nom1 == "Cognom1"){
                foreach($nombre as $cognom => $apellido){
                    echo "<p> $apellido </p>";
                }
            }
            if($cognom == "Cognom2"){
                foreach($apellido as $segapellido => $segcognom){
                    echo "<p> $segcognom </p>";
                }
            }
        
        }

    ?>
    
</body>
</html>