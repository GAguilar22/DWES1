<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $missatgeUsu = strtolower("Alumne Dam");
        $missatgecorrecte = "alumne dam";

        $entrades = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z";
        $arraylletres = explode (",", $entrades);
    

        if($missatgeUsu == $missatgecorrecte){
            echo $missxifrat;
        }
    ?>    
</body>
</html>