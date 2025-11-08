<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    $nom = $_GET["nom"];
    $cognom = $_GET["cognom"];
    echo "<p><strong> Client:</strong> $nom $cognom </p>";

    $email = $_GET["correo"];
    echo "<p><strong> Email: </strong> $email</p>";

    $assumpte = $_GET["assumpte"];
    echo "<p><strong> Assumpte: </strong> $assumpte </p>";

    $text = $_GET["text"];
    echo "<p><strong> Text: </strong> $text </p>";


    if (isset($_GET["origen"])){
               $origen = $_GET["origen"];
               switch($origen){
                   case "xarxesSocials":
                       echo"<p><strong>Ens has trobat:</strong> Xarxes socials</p>";
                       break;
                   case "publicitat":
                       echo"<p><strong>Ens has trobat:</strong> Publicitat</p>";
                       break;
                   case "conegut":
                       echo"<p><strong>Ens has trobat:</strong> Conegut</p>";
                       break;
                   case "altres":
                        $altres = $_GET["altres"];
                       echo"<p><strong>On ens has trobat:</strong> $altres</p>";
                       break;
               }
           }
?>
    
</body>
</html>