<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Benvingut a la pagina de resposta Get </h1>
    
    <?php

    $nomprofe = $_Get ["nombre"];
    $cognomprofe = $_Get ["apellido"];

    echo "<h1> Benvingut $nomprofe $cognomprofe a la pagina de resposta Get</h1>";
    

    ?>

</body>
</html>