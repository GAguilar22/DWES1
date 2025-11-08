<html>
    <head>
        <meta charset="UTF-8">
        <title>Tirada de daus</title>
    </head>
    <body>
        <h1>Tirada de daus</h1>
        <?php
        /*- **Modifica** el programa anterior per a que mostri una llista <ul> <li> en html amb el resultats de la tirada de daus
        - **Modifica** el programa anterior per a que mostri la frase, "Has tirat N cops un 5!
        - **Modifica** el programa anterior per saber quants cops ha sortit cada número del dau (switch)
            - El número 1 ha sortit N cops
            - El número 2 ha sortit N cops
            - ....
        - **Modifica** el programa anterior per a que mostri la imatge de dau per a cada tirada*/



            $contador;
            $contador5;

            echo "<ul>";
            # Primera tirada
            $tirada = rand(1,6);
            
            # mentre no surti 6 
            while($tirada != 6) {
                # Mostra tirada 
                print "$tirada<br>";
                
                # Tirada següent
                $tirada = rand(1,6);
            }
            
            # Tirada = 6 
                print "Felicitats! has obtingut un 6!<br>";


            echo "</ul>";
        ?>
    </body>
</html>