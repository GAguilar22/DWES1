<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Els bucles s'utilitzen per a repetir un bloc de codi
        //Fins que la condició es compleixi
        // bucles for
        // Es perfecte per a quan es coneix el número de vegades que s'ha de repetir el codi
            for(inicialització; condició; increment){
                //codi a executar
            }
        
        //while
        //El bucle while s'executa el codi mentre la condició sigui "true"
        //Si la condició mai es compleix el codi no s'executarà

        $i = 0;
        while($i < 5){
            echo "El valor de i es: $i";
            $i++;
        }   //El valor de $i anirà augmentan fins que arribi a 5 i soritrà del bucle

        // do while
        //Similar al while pero el codi s'executarà sempre mínim 1 vegada
        //Ja que la condició s'executa al while

        do{
            // codi a s'executar
        }while(condició);

        //1. Inicialització de la variable del bucle
        $vida =0;
        //2. Hem de definir bé la condició
        //3. Dintre del bulce hem de canviar el valor de la variable que actua com a condició
        do{
            // Codi a executar
        } while($vida > 0);

        //exemple for
        for($i = 0; $i < count($array); $i++){
            echo $array[$i];
        }

    ?>
</body>
</html>