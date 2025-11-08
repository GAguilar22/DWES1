<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta al formulari</title>
</head>
<body>
    
    <h1>Comprador principal</h1>

    <?php
    // Recuperació de dades del comprador principal
    $nom = $_POST["nomP"];
    $cognoms = $_POST["cognomP"];
    $edat = $_POST["edatP"];

    // Processar la resposta del radio button del comprador principal
    // Comprovem que el valor enviat sigui "estudiantP" per considerar-lo estudiant
    if (isset($_POST["estudiantP"]) && $_POST["estudiantP"] == "estudiantP") {
        $estudiant = true;
    } else {
        $estudiant = false;
    }

    // Inicialitzem els comptadors per cada categoria
    $contMenor = 0;
    $contMajor = 0;
    $contEspecial = 0;
    
    // Processament del comprador principal:
    // Si és menor de 18 → compta com a "menor"
    // Si és major o igual a 18 i és estudiant → compta com a "especial"
    // Altrament → compta com a "adult no estudiant"
    if ($edat < 18) {
        $contMenor++;
    } elseif ($edat >= 18 && $estudiant == true) {
        $contEspecial++;
    } else {
        $contMajor++;
    }
    
    // Mostrem el comprador principal
    echo "<p><strong>Client principal:</strong> $nom $cognoms</p>";

    // Processament de les altres persones (segona, tercera i quarta persona)
    // El bucle s'executa per les seccions amb índex 2, 3 i 4
    for ($entrada = 2; $entrada <= 4; $entrada++) {
        // Comprovem si hi ha dades per a aquesta persona (per exemple, el nom no és buit)
        if (!empty($_POST["nom$entrada"])) {
            // Recuperem l'edat introduïda en el camp "edatX"
            $edatAfegida = $_POST["edat$entrada"];
            
            // Determinem si aquesta persona és estudiant
            // El valor que hem d'esperar és "estudiantX" on X és l'índex corresponent
            if (isset($_POST["estudiant$entrada"]) && $_POST["estudiant$entrada"] == "estudiant$entrada") {
                $personaAfegida = true;
            } else {
                $personaAfegida = false;
            }

            // Aplicació de la lògica tarifària:
            // - Si l'edat és inferior a 18 → incrementem $contMenor.
            // - Si l'edat és major o igual a 18 i és estudiant → incrementem $contEspecial.
            // - En cas contrari → incrementem $contMajor.
            if ($edatAfegida < 18) {
                $contMenor++;
            } elseif ($edatAfegida >= 18 && $personaAfegida == true) {
                $contEspecial++;
            } else {
                $contMajor++;
            }
        }
    }

    // Mostrem un resum dels comptadors
    echo "<p><strong>Resum d'entrades:</strong></p>";
    echo "<p>Menors de 18: $contMenor</p>";
    echo "<p>Adults estudiants: $contEspecial</p>";
    echo "<p>Adults no estudiants: $contMajor</p>";

    // Definició dels preus per cada categoria
    $preuMenor = 4.50;
    $preuAdult = 8.00;
    $preuDescompte = 5;  // Tarifes per als adults estudiants (especial)

    // Calculem els subtotals per cada categoria
    $preuMenorTotal = $preuMenor * $contMenor;
    $preuAdultTotal = $preuAdult * $contMajor;
    $preuDescompteTotal = $preuDescompte * $contEspecial;
    
    // Calculem el preu total de les entrades
    $preuTotalEntrades = $preuMenorTotal + $preuAdultTotal + $preuDescompteTotal;

    // Mostrem el preu per cada grup i el total final
    echo "<p><strong>Preu per cada grup:</strong></p>";
    echo "<p>$contMenor menors de 18 (tarifa de $preuMenor €): total $preuMenorTotal €</p>";
    echo "<p>$contEspecial adults estudiants (tarifa de $preuDescompte €): total $preuDescompteTotal €</p>";
    echo "<p>$contMajor adults no estudiants (tarifa de $preuAdult €): total $preuAdultTotal €</p>";
    echo "<p><strong>Preu total:</strong> $preuTotalEntrades €</p>";
    ?>

</body>
</html>
