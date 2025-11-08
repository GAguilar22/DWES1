<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $pizzes[] = ["Margarita", "Carbonara", "Diavola", "Pernil i champinyons", "Tonyina i ceba", "Quatre Formatges"];

    $ingredients = ["mozzarella", "pebrots", "olives negres", "olives verdes", "anxoves", "pinya", "champinyons", "roquefort", "pernil salat"];

    ?>


    <h1>Formulari de comandes de Pizzes</h1>

    <form action="respostaFormulari.php" method="post">


        <label for="">
            <p> <strong>Nom del client </strong><input type="text" name="nom" id="nom" required></p>
        </label>

        <label for="">
            <p> <strong>Telèfon del client </strong><input type="number" name="telefon" id="telefon" required></p>
        </label>

        <label for="">
            <p> <strong>Adreça </strong><input type="text" name="adresa" id="adresa" required></p>
        </label>

        <label for="">
            <p><strong>Quantitat: </strong><select name="quantitat" id="quantitat" required>
                    <option value="0">1</option>
                    <option value="1">2</option>
                    <option value="2">3</option>
                    <option value="3">4</option>
                </select></p>
        </label>

        <label for="">
            <p> <strong>Tipus de pizza: </strong> <select name="pizzes[]" id="pizzes" required>

                    <option value="pizzes">
                        <?php
                        foreach ($pizzes as $pizza => $p) {
                            echo $p;
                        }
                        ?>
                    </option>

                </select></p>
        </label>

        <label for="">
            <p> <strong>Mida: </strong> </p>
            <p>Petita <input type="radio" name="mida" id="mida" value="petita"></p>
            <p>Mitjana <input type="radio" name="mida" id="mida" value="mitjana"></p>
            <p>Familiar <input type="radio" name="mida" id="mida" value="familiar"></p>
        </label>

        <label for="">
            <p> <strong>Tipus de massa: </strong></p>
            <p>Massa Fina <input type="radio" name="massa" id="massa" value="fina"></p>
            <p>Massa Gruixuda <input type="radio" name="massa" id="massa" value="gruixuda"></p>
        </label>

        <label for="">
            <p><strong>Ingredients extra: </strong></p>
            <p><input type="checkbox" name="ingredients[]" id="ingredients" value="$i">
            
            <?php
                foreach ($ingredients as $ingredient => $i) {
                    print $i;
                }

            ?>
            </p>
        </label>


        <input type="submit" value="Fer comanda">




    </form>

</body>

</html>