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
Dado un array de 20 elementos que consiste en números reales (con coma
decimal) y que cada elemento representa la venta del día de un comercio. Calcular el promedio
de ventas utilizando alguna estructura iterativa.
*/

$array20 = [$a = 1.02, $b = 2.01, $c = 3.03, $d = 4.04, $e = 5.05, $f = 6.06, $g = 7.07, $h = 8.08, $i = 9.09, $j = 10.01,
$k = 11.02, $l = 12.02, $m = 13.03, $n = 14.04, $o = 15.05, $p = 16.06, $q = 17.07, $r = 18.08, $s = 19.09, $t = 20.01];
$sumatoria = 0;
foreach($array20 as $value){
$sumatoria = $sumatoria + $value;
}
$resultado = $sumatoria / count($array20);
echo "<p>$resultado</p>";
?>

</body>
</html>