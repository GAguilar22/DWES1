<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Condicionals
        //if es l'estructura més bàsica per realitzar una comparació
        // Si la condició que s'evalua com a verdadera, s'executa el codi dintre de les claus"{}"
        $edad = 18;
        if($edad >18){
            echo "Ets major d'edat";
        }

        //else
        //S'utilitza amb el "if"
        //Si la condició del if es falsa s'executarà dintre del else

        if($edad >=18){
            echo"Ets major d'edat";
        }else{
            echo "Ets menor d'edat";
        }

        //else if
        //permet evaluar múltiples condicions
        //S'utilitza quan tens varies condicions que vols comprobar

        $edad = 20;

        if($edad < 18){
            echo "Ets massa petit";
        } elseif ($edad <= 20){
            echo "Tens l'edad justa";
        } else{
            echo "Ets adult";
        }

        // switch case
        //És útil quan tens una vaiable que pot tenir múltiples valors
        // Permet executar diferents blocs de codi depenent del valor de la variable

        $dia = "dilluns";

        switch($dia){
            case "dilluns":
                echo "Avui és dilluns";
                break;
            
            case "dimarts":
                echo "Avui és dimarts";
                break;
            
            case "dimecres":
                echo "Avui és dimecres";
                break;
            
            case "dijous":
                echo "Avui es dijous";
                break;
            //default s'executa quan el valor de la variable no coincideix
            default:
            echo "No es ni dilluns, ni dimarts, ni dimecres, ni dijous";
        }
        
    ?>    
</body>
</html>