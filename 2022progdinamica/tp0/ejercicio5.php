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
/*Mostrar por pantalla la tabla de multiplicar del 2. Emplear el for, luego el while y
por último el do/while. La salida debe verse con el siguiente formato:
2 x 1 es 2
2 x 2 es 4
*/
for($i = 0; $i <= 20; $i=$i+2){
    echo "<h1>$i</h1>";
}
?>

<?php
$resultado = 0;
echo $resultado;
while($resultado < 20){
    $resultado = $resultado + 2;
    echo "<h2>$resultado</h2>"; 
}
?>

<?php
$resultado = 0;
do{
    
    $resultado = $resultado + 2;
echo "<h3> $resultado </h3>" ;
}while($resultado < 20)
?>

</body>
</html>