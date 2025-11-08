<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Utilitzeu la funció array() per crear un array $php_arraque tingui la següent clau => parells de valors:
        - La clau "idioma" hauria d'apuntar al valor "PHP".
        - La clau "creador" hauria d'apuntar al valor "Rasmus Lerdorf".
        - La clau "year_created" hauria d'apuntar al valor 1995.
        - La clau "filename_extensions" hauria d'apuntar al l’array [".php", ".phtml", ".php3", ".php4", ".php5", ".php7", ".phps", ".php- s", ".pht", ".phar"]*/

        $php_arraque = array ("idioma" => "PHP", "creador" => "Rasmus Lerdorf", "year_created" => "1995",

         "filename_extensions" => array(".php", ".phtml", ".php3", ".php4", ".php5", ".php7", ".phps", ".php- s", ".pht", ".phar")     
                        );

                foreach($php_arraque as $key => $value){
                        echo"<p>$key </p>";
                        echo"<p> $value </p>";
                        if($key == "filename_extensions"){
                            echo "<p>Values: </p>";
                            foreach($value as $elemnento_array){
                                echo " $elemnento_array";
                            }
                        } else{
                            echo "<p>Value: $value</p>";
                        }
                    }
            
            

    ?>
    
</body>
</html>