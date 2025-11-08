<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    /*Php és un llenguatge de codi obert molt utilitzat ja que es pot utilitzar amb HTML
    Php és case-sensitive sense tenir en compte intrucciones com while, if, array, etc 
    
    Les variables s'inicien amb el símbol "$" i sempre comença amb una lletra o un guió baix (_)
    Les variables no son tipades, per tan no cal declarar especificament (int,double,etc) i a més,
    poden canviar al llarg d'una execució
    */  

    $x ="Hola";  
    //String (son cadenes de text)

    $x = 100;   
    //Integer (int) (número enters, mai decimals)
    
    $x = 10.55; 
    // Float o Double (números decimals)
    
    $x = true; 
    //Boolean (només pot ser o true o false)
    
    $s = null; 
    // Null (variable de tipus especial) (encara no fetes)
    
    //La variable ha anat canviat en cada linea
    
    echo gettype($x) // Ens retornarà el tipus de dada, la variable null ens dirà que no té cap valor assignat

    // Les variables de tipus strings son de tipus compost
    // Aquestes variables ens permeten guardar diferents múltiples valors en una sola variable
    // Es poden dividir en dos tipus: arrays i objectes (Mirar arrays)

    ?>
</body>
</html>