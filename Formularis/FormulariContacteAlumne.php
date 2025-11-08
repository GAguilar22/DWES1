<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="RespostaFormulariAlumne.php" method="post">


        <p> Nombre: <input type="text" name="nombre" id="nombre"></p>
        <p> Apellido: <input type="text" name="apellido" id="apellido"></p>
        <p> Edad: <input type="number" name="edad" id="edad"></p>
        <p> Adreça: <input type="text" name="direccio" id="direccio"></p>
        <p>
            Provincia: <select name="provincies[]" id="provincies">
                <option value="Lleida">Lleida </option>
                <option value="Tarragona"> Tarragona </option>
                <option value="Barcelona"> Barcelona </option>
                <option value="Girona"> Girona </option>
            </select>
        </p>
        <p> Telèfon: <input type="tel" name="telefon" id="telefon"></p>
        <p> Email: <input type="email" name="email" id="email"></p>
        <p> Color: <input type="color" name="color" id="color"></p>
        <p>
            Cicle que estudia: <select name="cicles[]"  id="cicles">
                <option value="SMX">SMX</option>
                <option value="ASIX">ASIX</option>
                <option value="DAM">DAM</option>
                <option value="DAW">DAW</option>
            </select>
        </p>

        <p> Solter <input type="radio" name="estatcivil" id="estatcivil" value="solter"></p>
        <p>Casat <input type="radio" name="estatcivil" id="estatcivil" value="casat"></p>
        <p>Separat <input type="radio" name="estatcivil" id="estatcivil" value="separat"></p>
        <p>Viudo <input type="radio" name="estatcivil" id="estatcivil" value="viudo"></p>

        <p>Estudiant <input type="checkbox" name="estudiant" id="estudiant"></p>
        <p>Treballant <input type="checkbox" name="treballant" id="treballant"></p>

        <p><input type="submit" value="Enviar">
        <input type="reset" value="Borrar"></p>


    </form>   
</body>
</html>