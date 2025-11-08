<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*Crea un formulari de recollida de dades personals que consti de dues pàgines.
        - A la primera pàgina es demanen les dades (nom, cognoms, edat, pes, sexe, estat civil, aficions - checkbox, adreça de correu electrònic i imatge personal)
        - A la segona pàgina es mostra tota la informació introduïda,*/
    ?>

    <form action="Formulari2.php" method="post">

        <p>Nom <input type="text" name="nom" id="nom" required></p>

        <p>Cognom <input type="text" name="cognom" id="cognom" required></p>

        <p>Edad <input type="number" name="edad" id="edad" required></p>

        <p>Pes <input type="number" name="pes" id="pes" required></p>

        <p>Sexe </p>
        <p>Home <input type="radio" name="sexe" value="home"></p>
        <p>Dona <input type="radio" name="sexe" value="dona"></p>

        <p>Email</p>
        <input type="email" name="email" id="email" required>

        <p>Estat Civil <select name="estatcivil" id="estatcivil" required>
            <option value="casat">Casat</option>
            <option value="solter">Solter</option>
            <option value="viudo">Viudo</option>
         </select></p>

        <p>Aficions: </p>
        <p><input type="checkbox" name="aficions[]" id="esports" value="esports">esports</p>
        <p><input type="checkbox" name="aficions[]" id="videojocs" value="videojocs">videojocs</p>
        <p><input type="checkbox" name="aficions[]" id="follar" value="follar">follar</p>

        <input type="submit" value="Enviar">


    </form>


    
</body>
</html>