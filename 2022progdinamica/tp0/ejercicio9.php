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
– Dado un array enumerativo de 10 elementos de números enteros (sin coma
decimal), encontrar el máximo de todos esos números usando una estructura iterativa y
mostrarlo por pantalla.
*/
$arrayNumeros = [$a = 1, $b = 2, $c = 333, $d = 4, $e = 5, $f = 6, $g = 7, $h = 8, $i = 9, $j = 10];

foreach($arrayNumeros as $value){
    $resultado = max($arrayNumeros);
    
}
echo "<p>$resultado</p>";
?>

</body>
</html>