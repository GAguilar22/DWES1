<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Aquesta secció defineix la capçalera del document HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resposta al Formulari Array</title>
</head>

<body>

    <?php
    // ----------------------------------------------
    // 1. Inicialitzem l'array global per guardar les entrades
    // ----------------------------------------------
    // Aquí creem un array buit (una llista) que servirà per guardar la informació de cada persona (comprador principal i altres).
    $entrades = array();

    // ----------------------------------------------
    // 2. Processament del Comprador Principal
    // ----------------------------------------------
    // Recuperem les dades del formulari enviat pel navegador.
    // $_POST és una variable que conté tota la informació enviada mitjançant el mètode "post" del formulari.
    $compNom    = $_POST["nomP"];    // Agafa el valor del camp "nomP" (per el nom)
    $compCognom = $_POST["cognomP"]; // Agafa el valor del camp "cognomP" (per els cognoms)
    $compEdat   = $_POST["edatP"];   // Agafa el valor del camp "edatP" (per l'edat)

    // Comprovem si el comprador principal és estudiant.
    // Si el camp "estudiantP" existeix i el seu valor és "estudiantP", assignem true; si no, assignem false.
    if (isset($_POST["estudiantP"]) && $_POST["estudiantP"] == "estudiantP") {
        $compEstudiant = true;
    } else {
        $compEstudiant = false;
    }

    // Creem un array associatiu per al comprador principal.
    // En aquest array cada clau (com "nom", "cognoms", "edat", "estudiant") s'assigna el valor corresponent.
    $comprador = array(
        "nom"       => $compNom,
        "cognoms"   => $compCognom,
        "edat"      => $compEdat,
        "estudiant" => $compEstudiant
    );

    // Afegim l'array del comprador principal a l'array global $entrades.
    $entrades[] = $comprador;

    // ----------------------------------------------
    // 3. Processament de les altres persones (segona, tercera i quarta)
    // ----------------------------------------------
    // Utilitzem un bucle for per repetir el procés per a cadascuna de les entrades addicionals.
    // El bucle s'executa amb $i que varia des del 2 fins al 4, ja que el comprador principal ja s'ha processat.
    for ($i = 2; $i <= 4; $i++) {
        // Comprovem si el camp "nom$i" té alguna dada.
        // Si no està buit, procedim a processar la persona.
        if (!empty($_POST["nom$i"])) {

            // Recuperem el valor dels camps "nom$i", "cognom$i" i "edat$i" del formulari.
            $nom     = $_POST["nom$i"];
            $cognoms = $_POST["cognom$i"];
            $edat    = $_POST["edat$i"];  // Els camps d'edat s'han definit com "edat2", "edat3", etc.

            // Determinem si aquesta persona és estudiant.
            // Es comprova si existeix el camp "estudiant$i" i si el seu valor és "estudiant$i".
            if (isset($_POST["estudiant$i"]) && $_POST["estudiant$i"] == "estudiant$i") {
                $esEstudiant = true;
            } else {
                $esEstudiant = false;
            }

            // Creem un array associatiu per a aquesta persona amb les seves dades.
            $persona = array(
                "nom"       => $nom,
                "cognoms"   => $cognoms,
                "edat"      => $edat,
                "estudiant" => $esEstudiant
            );

            // Afegim aquesta persona a l'array global $entrades.
            $entrades[] = $persona;
        }
    }

    // ----------------------------------------------
    // 4. Mostrem la informació de cada entrada
    // ----------------------------------------------
    // Ara recorrem l'array global $entrades per mostrar les dades emmagatzemades.
    // Aquí, $index conté la posició de cada element dins de l'array (comença en 0) i $persona és un array associatiu amb la seva informació.
    echo "<h1>Rebut de Compra</h1>";
    foreach ($entrades as $index => $persona) {
        // Declarem una variable per a guardar l'estat: "Estudiant" o "No estudiant"
        $estat = "";
        if ($persona["estudiant"]) {
            $estat = "Estudiant";
        } else {
            $estat = "No estudiant";
        }

        // Es construeix un paràgraf HTML que mostra la informació de la persona.
        // $index + 1 s'utilitza per numerar les persones començant per 1.
        echo "<p><strong>Persona " . ($index + 1) . ":</strong> " . $persona["nom"] . " " . $persona["cognoms"] . " - Edat: " . $persona["edat"] . " - " . $estat . "</p>";
    }

    // ----------------------------------------------
    // 5. Càlcul de tarifes
    // ----------------------------------------------
    // La lògica de tarifació és:
    // - Si una persona té edat menor a 18, se li assigna una tarifa de 4.50 €.
    // - Si té edat 18 o superior i és estudiant, se li assigna una tarifa especial de 5 €.
    // - En altres casos (persona adulta no estudiant), se li assigna una tarifa de 8.00 €.
    $contMenor   = 0;  // Comptador per als menors de 18 anys
    $contEspecial = 0;  // Comptador per als adults estudiants (tarifa especial)
    $contMajor    = 0;  // Comptador per als adults no estudiants

    // Recorrem l'array $entrades per determinar en quina categoria encaixa cada persona.
    foreach ($entrades as $persona) {
        // Convertim l'edat a nombre enter per assegurar-nos que podem comparar correctament.
        $personaEdat = (int)$persona["edat"];
        if ($personaEdat < 18) {
            $contMenor++;
        } elseif ($personaEdat >= 18 && $persona["estudiant"] === true) {
            $contEspecial++;
        } else {
            $contMajor++;
        }
    }

    // Definim els preus per a cada categoria
    $preuMenor     = 4.50; // Preu per als menors de 18
    $preuDescompte = 5;    // Preu per als adults estudiants (tarifa especial)
    $preuAdult     = 8;    // Preu per als adults no estudiants

    // Calculem el cost total per cada grup multiplicant el nombre de persones per la tarifa corresponent.
    $totalMenor    = $contMenor * $preuMenor;
    $totalEspecial = $contEspecial * $preuDescompte;
    $totalMajor    = $contMajor * $preuAdult;
    // El total global és la suma de tots els totals parcials.
    $totalGeneral  = $totalMenor + $totalEspecial + $totalMajor;

    // Mostrem el resum dels càlculs de preu.
    echo "<h2>Resum d'entrades i preus</h2>";
    echo "<p>Menors de 18: $contMenor x $preuMenor € = $totalMenor €</p>";
    echo "<p>Adults estudiants: $contEspecial x $preuDescompte € = $totalEspecial €</p>";
    echo "<p>Adults no estudiants: $contMajor x $preuAdult € = $totalMajor €</p>";
    echo "<p><strong>Preu total: $totalGeneral €</strong></p>";
    ?>

</body>

</html>
