<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Els arrays són una estructura de dades que permet emmagatzemar múltiples valors en una sola variable
    //Hi ha diferents tipus: Array indexat, Array associatiu i Array mmultidimensional

    //Array indexats: Els seus valors són números enters (0,1,2,3,...) Sempre començen desde 0.
    //Exemple:
    $fruites = array("poma", "pera", "taronja");
    //Per accedir a un element del array indexat ho fem de la seguent manera:
    echo $fruites[0]; // Mostrarà "poma"
    //Fiquem 0 perquè cada element és un nombre enter, que va de manera ordenada
    // poma => 0, pera => 1,...

    //Array associatiu: Els index són cadenes (claus) en lloc de enters.
    //Exemple:
    $persona = array("nombre" => "Juan", "edad" => 25, "ciutat" => "madrid");
    //Per accedir a un valor utilitzarem la seva clau
    echo $persona["nombre"]; //Mostrarà "Juan", perque nombre es la clau del valor )clau => valor)

    //Array multidimensional: Son arrays que contenen altres arrays.
    //Exemple:
    $productes = array(
        array("nombre" => "Portàtil", "preu" => 1200), // Nomes fiquem "," all final,
                                                       // En lloc de ";"
                                                       // ja que seguim dintre d'un array.
        array("nombre" => "Tablet", "preu" => 500)     // no fiquem "," perque és l'últim element del array
    );
    //Per accedir a un element del array multidimensional:
    echo $productes[0]["nombre"] // Mostrarà "portatil"


    ?>    
</body>
</html>