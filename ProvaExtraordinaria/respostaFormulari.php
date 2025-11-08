<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1> Dades del client</h1>

    <?php
    $nom = $_POST["nom"];
    $telefon = $_POST["telefon"];
    $adresa = $_POST["adresa"];

    echo "<p> Nom del client: $nom </p>";
    echo  "<p><strong>Telèfon de contacte: $telefon</strong></p>";
    echo  "<p><strong>Adreça del client: $adresa</strong></p>";

    if (isset($_POST["quantitat"])) {
        $numQuantitat = $_POST["quantitat"];
        echo  "<p><strong>Nombre de pizzes: $numQuantitat</strong></p>";
    }

    if (isset($_POST["pizzes"])) {
        $pizzes = $_POST["pizzes"];
        foreach ($pizzes as $pizza) {
            echo "<p><strong> Varietat de pizza: $pizza</strong></p>";
        }
    }

    $preuPetites = 10;
    $preuMitjanes = 12;
    $preuFamiliars = 15;
    $contGruixuda = 0;
    $contPetites =0;
    $contMitjanes =0;
    $contFamiliars =0;
    $massaGruixuda = 0;

    if (isset($_POST["mida"])) {
        $midaUs = $_POST["mida"];
        switch ($midaUs) {
            case "petita";
                echo "<p><strong> Mida pizzes: $midaUs</strong></p>";
                $contPetites++;
                break;

            case "mitjana";
                echo "<p><strong> Mida pizzes:  $midaUs</strong></p>";
                $contMitjanes++;
                break;

            case "familiar";
                echo "<p><strong> Mida pizzes:  $midaUs</strong></p>";
                $contFamiliars++;
                break;
        }
    }



    if (isset($_POST["massa"])) {
        $massaUs = $_POST["massa"];
        switch ($massaUs) {
            case "fina";
                echo "<p><strong> Tipus de massa: $massaUs </strong></p>";
                break;

            case "gruixuda";
                echo "<p><strong> Tipus de massa: $massaUs </strong></p>";
                $massaGruixuda = 2;
                break;
        }
    }

    echo "<p><strong>Ingredients extra:</strong></p>";


    $preuPizzaPetita = $preuPetites * $contPetites;
    $preuPizzaMitjana = $preuMitjanes * $contMitjanes + $massaGruixuda;
    $preuPizzaFamiliar = $preuFamiliars * $contFamiliars;

    $preuTotalFinal = $preuPizzaPetita + $preuPizzaMitjana + $preuPizzaFamiliar;

    echo "<p><strong>Preu total Comanda: $preuTotalFinal  €</strong></p>";

    ?>

</body>

</html>