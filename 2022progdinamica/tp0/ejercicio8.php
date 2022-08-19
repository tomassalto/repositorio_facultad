<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
/*
– Dado el siguiente array:
$nombres = array(‘roberto’,’juan’,’marta’,’moria’,’martin’,’jorge’,’miriam’,’nahuel’,’mirta’). Realizar
un programa en PHP que lo recorra y genere un nuevo array con aquellos nombres que
comiencen con la letra m. Definir qué bucle conviene usar y luego mostrar el array resultado
por pantalla sin usar var_dump ni print_r. Los nombres deben aparecer uno debajo del otro.
*/

$nombres = array("roberto","juan","marta","moria","martin","jorge","miriam","nahuel","mirta");
$arrayNuevo = [];
foreach($nombres as $value){
    if($value[0] == "m"){
        array_push($arrayNuevo, $value);
        echo "<p>$value</p>";
    }
}

?>

</body>
</html>