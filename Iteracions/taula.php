<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <table>
        <tr>
            <th>SIN</th>
            <th>COS</th>
        </tr>   

    <?php

        for($x = 0; $x <= 2; $x = $x + 0.01) {
            $sin = sin($x);
            $cos = cos($x);


            echo "<tr>"; 
            if ($sin >= 0){
                echo "<td style='color: blue'> SIN($x): $sin</td>";
            }
            else{
                echo "<td style='color:red'> SIN($x): $sin</td";
            }

            if($cos <= 0){
                echo "<td style='color: red'> COS($x) : $cos</td>";
            }
            else{
                echo "<td style='color: blue'> COS($x) : $cos</td>";
            }
            echo "</tr>";
        }

    ?>
    
    </table>
</body>
</html>