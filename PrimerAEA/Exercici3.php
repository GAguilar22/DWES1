<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post">

    <p><select name="joc[]" id="joc" required>
        <option value="pedra" >Pedra</option>
        <option value="paper">Paper</option>
        <option value="tisora">Tisora</option>
    </select>
    <input type="submit" value="jugar">

</form>
    <?php
    $pedra = 1;
    $paper = 2;
    $tisora = 3;
    $tiradaia = array("pedra", "paper", "tisora");

    if(isset($_POST["joc"])){
        $joc = $_POST["joc"];
        foreach($joc as $eleccio){
            echo "<p> L'usuari escull: $eleccio </p>";
            
        }
        foreach($tiradaia as $ia){
            //echo "<p> La IA treu: $ia  </p>";
        }
        echo "<p> La IA treu: $tiradaia[2] </p>";
        

        if($pedra < $tisora){
            echo "<p> Guanya l'usuari";
        }elseif($pedra > $paper){
            echo "<p> Guanya la IA";
        }elseif ($pedra == $pedra){
            echo "Empat";
        }
    }



    ?>
</body>
</html>