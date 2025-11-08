<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="recollidaProducteGet.php" method="get">

        <p>Nom del producte: <input type="text" name="nomProd" id="nomProd" required></p>
        <p>Marca: <select name="marques[]" id="marques" required>
                <option value="Bosch">Bosch</option>
                <option value="Teka">Teka</option>
                <option value="Fagor">Fagor</option>
                <option value="Balay">Balay</option>
                <option value="Siemens">Siemens</option>
            </select>
        </p>
        <p>Preu sense IVA: <input type="number" name="preusiniva" id="preusiniva" required></p>
        <p>Tipus de iva: 
            4% <input type="radio" name="iva" id="iva" value="quatre" required> 
            8%<input type="radio" name="iva" id="iva" value="vuit"> 
            21%<input type="radio" name="iva" id="iva" value="vintiu"> </p>

        <p>Disponibilitat: <input type="number" name="disponibilitat" id="disponibilitat" required></p>

        <p><button type="submit">Enviar</button>
        <input type="reset" value="Borrar"></p>



    </form>
</body>
</html>