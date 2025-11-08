<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    //Variables que necessitarem
    $guanyadora = array();
    $complementari;
    $reintegro = random_int(0,9);
    $contador = 0;
    
    //Fem un bucle amb for perque sabem que necessitem un màxim de 7 números
    for($i = 0; $i < 7;$i++){
        //Variable pel numero del usuari entre 1-49
        $numUs = random_int(1,49);
        //Fem una flag per saber si el número ja està al array
        $trobat = false;

        //Utilitzo foreach per comprovar si el número ja està dins el array
       foreach($guanyadora as $num){
            if($num == $numUs){ //Si el número ja està al array marquem la flag com a true
            $trobat = true;
             }
         }
            //Si el número trobat no està al array
            if(!$trobat){
                //Mirem que hi hagin 6 numeros o menys al array per encara no posar valor al número complementari
                if($contador < 6){
                    $guanyadora[] = $numUs; 
                    $contador++;    //Incrementem el contador per saber quants números no repetits tenim
                }else{
                    //Si ja tenim 6 números, agafem un últim número per al complementari
                    $complementari = $numUs;
                }
                
            }else{  //Restem un al contador, si el número ja està dins la array
                $i--;
            }
    }
    //Mostrem els resultats
    echo "<p> La combinació guanyadora de la 6/49 és: ";
    foreach($guanyadora as $num){
        echo $num . " ";
    }
    echo "</p>";
    echo "<p> El complementari: " . $complementari . "</p>";
    echo "<p> El reintegrament: " . $reintegro . "</p>";

    ?>
    
</body>
</html>