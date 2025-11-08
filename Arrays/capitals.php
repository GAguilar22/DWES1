<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!--Coloquem el style per a la nostra taula -->
<style>
    table, th, td{
        border: 3px solid black;
        border-collapse: collapse;
    }
</style>
<body>
    <?php
    // Creem el array
    $EU = array(
        "España" => "Madrid",
    "Luxembourg"=>"Luxembourg",
    "Belgium"=> "Brussels", 
    "Denmark"=>"Copenhagen", 
    "Finland"=>"Helsinki", 
    "France" => "Paris", 
    "Slovakia"=>"Bratislava", 
    "Slovenia"=>"Ljubljana", 
    "Germany" => "Berlin", 
    "Greece" => "Athens", 
    "Ireland"=>"Dublin", 
    "Netherlands"=>"Amsterdam");

    // Creem la nostre taula
    print "<table>";

    // Utilitzem el foreach per a que recorri tota la taula i ens apareguin les capitals i ciutats on vulguem
    foreach ($EU as $x => $y)

    {
        // Utilitzem print tr per a crear una fila
        print "<tr>";
            print  "<td>";
            // td per a que ens posi els paisos en una columna
            print "<td> $x </td>";
            // un altre td per a que les capitals apareixin en un altre columna            
            print "<td> $y </td>";

        print "<tr>";
    
    }
    // Tanquem la taula
    print "</table>";

    ?>
    
</body>
</html>