<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="recollidaContacteGet.php" method="get">

        <p>Nom <input type="text" name="nom" id="nom" required></p>
        <p>Cognom <input type="text" name="cognom" id="cognom" required></p>
        <p>Email <input type="email" name="correo" id="correo" required></p>
        <p>Assumpte</p> 
            <p><textarea name="assumpte" id="assumpte"></textarea></p>
        <p>Text</p> 
            <p><textarea name="text" id="text" required></textarea></p>
        <p>On ens has trobat? </p>
                <p>Conegut<input type="radio" name="origen" id="origen" value="xarxesSocials" required></p>
                <p>Web<input type="radio" name="origen" id="origen" value="publicitat"></p>
                <p>Instagram<input type="radio" name="origen" id="origen" value="conegut"></p>
                <p>Altres <input type="text" name="altres" id="altres"><input type="radio" name="origen" id="origen" value="altres"></p>

            <input type="submit" value="Enviar" >
    
    </form>
</body>
</html>