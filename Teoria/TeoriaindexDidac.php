<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Benvingut DAWW1 Tarda</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h1> Titulo Grande </h1>

        <!--Comença el body de la pàgina
        <p> Hola alumnes de DAW 1 Tarda</p>
        <p> Gerard Aguilar</p>
        -->

        <?php 
        // Etiqueta per començar a escriure en PHP

        $profe = "Didac Jiménez";
        $edat = 42;
        echo "<p>Hola alumnes de DAW 1 Tarda</p>";
        echo '<p>' . $profe. '</p>';
        echo "<p> $profe té $edat";
        echo "<p> Didac Jiménez </p>";
        $edat = "40 anys";
        // Amb l'etiqueta <strong> posem en negreta.. normalment es fa amb css
        echo "<p> $profe  te <stong> $edat </strong> </p>";
        echo "<p> $profe té $edat </p>";

    
        // Etiqueta per tancar el llenguatge PHP

        // Arrays

        echo "<ol>"; // En HTML etiqueta per a fer vinyetes (Ordered List)
        echo "<ul>"; // Per a fer vinyetes en HTML amb (Unordered List)





      



        //Increments
        // Introducció a php pag 21        
        $a =0
        $a ++ => $a = $a +1 <= ++$a //En el segons cas es fa primer l'increment
        $a-- => $a = $a -1 <= --$a


        // Sempre es fara primer la multiplicació
        $x (++$a) * 5 
        
        // Es fara primer la variable i despres es fará la incrementació
        $x ($a++) * 5 


        // Casos raros
        // Asignacion por valor o referencia
        // Introducció a php pag 18

        $var = 4.5;
        echo gettype($var);










        ?>




<!-- Tablas
        -->
        <!-- Insertar tabla -->
        <table>
            <!-- fila-->
            <tr>
                <!-- columna-->
                <td>
                    Celda 0,0
                </td>
            </tr>
            
        </table>

    </body>
</html>