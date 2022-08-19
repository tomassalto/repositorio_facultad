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
// function divisores($parametro){

// if($parametro / $numero != 0){
//     $guardar = $parametro;
// }
//     return $guardar;
// }
// divisores($parametro);
// $num=20;
// echo "Los divisores de $num son: ";
// foreach(divisores($num) as $divisor)
// echo "$divisor <br />";
?>

<?php
function saludo($hora){
if($hora >= 5 && $hora < 13){
    return "Buenos dias";
}
elseif($hora >= 13 && $hora < 20){
    return "Buenas tardes";
}else{
    return "Buenas noches";
}
}
//Completar aquí con la definición de la function saludo()
$nombre="Tomas";
echo "¡" . saludo(23) . " , $nombre!";
?>
</body>
</html>