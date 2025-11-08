<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $nomProd = $_GET["nomProd"];
    echo "<p><strong> Producte: </strong> $nomProd </p> ";

    if(isset($_GET["marques"])){
        $marques = $_GET["marques"];
        
        foreach($marques as $marca){
            echo "<p><strong> Marca: </strong> $marca </p>";
        }
    }

    $preusiniva = $_GET["preusiniva"];
    $iva = $_GET["iva"];

    switch($iva){
        case "quatre";
            $iva = 0.04;
            break;

        case "vuit";
            $iva = 0.08;
            break;

        case "vintiu";
            $iva = 0.21;
            break;
    }

    $ivatotal = $preusiniva * $iva;
    $preutotal = $ivatotal + $preusiniva;
        echo "<p><strong> Preu amb iva:</strong> $preutotal </p> ";

    $disponibilitat= $_GET["disponibilitat"];
        echo "<p><strong> Disponibilitat: </strong> $disponibilitat";

    ?>
    
</body>
</html>