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

function darMes($numero){

    $arrayMeses = [$uno = "Enero", $dos = "Febrero", $tres = "Marzo", $cuatro = "Abril", $cinco = "Mayo", $seis = "Junio", $siete = "Julio",
    $ocho = "Agosto", $nueve = "Septiembre", $diez = "Octubre", $once = "Noviembre", $doce = "Diciembre"];
    switch($numero){
        case 1:
            $resultado = $arrayMeses[0];
            echo "<p>$resultado</p>";
            break;
        case 2:
            $resultado = $arrayMeses[1];
            echo "<p>$resultado</p>";
            break;
        case 3:
            $resultado = $arrayMeses[2];
            echo "<p>$resultado</p>";
            break;
        case 4:
            $resultado = $arrayMeses[3];
            echo "<p>$resultado</p>";
            break;
        case 5:
            $resultado = $arrayMeses[4];
            echo "<p>$resultado</p>";
            break;
        case 6:
            $resultado = $arrayMeses[5];
            echo "<p>$resultado</p>";
            break;
        case 7:
            $resultado = $arrayMeses[6];
            echo "<p>$resultado</p>";
            break;
        case 8:
            $resultado = $arrayMeses[7];
            echo "<p>$resultado</p>";
            break;
        case 9:
            $resultado = $arrayMeses[8];
            echo "<p>$resultado</p>";
            break;
        case 10:
            $resultado = $arrayMeses[9];
            echo "<p>$resultado</p>";
            break;
        case 11:
            $resultado = $arrayMeses[10];
            echo "<p>$resultado</p>";
            break;
        case 12:
            $resultado = $arrayMeses[11];
            echo "<p>$resultado</p>";
            break;
    }
}
darMes(8);

function fechas($string){
    $resultado = explode("/", $string);
    $final = $resultado[2]."/".$resultado[1]."/".$resultado[0];
    echo "<p>$final</p>";
}
fechas("20/08/1999");

function calcularIva($precio){
 $precioIva = $precio * 0.21;
 $precioFinal = $precio + $precioIva;
 
 echo "<p>$precioFinal</p>";
}
calcularIva(2000);

function pesosADolares($importe, $cotizacion){

    if($cotizacion == 0){
        $resultadoFinal = $importe * 6;
    }else{
        $resultadoFinal = $importe * $cotizacion;
    }
    echo "<p>$resultadoFinal</p>";

}
pesosADolares(200, 0);

function redondear($numero){

    $numerito = round($numero, 2);
    echo "<p>$numerito</p>";
}
redondear(15.98534);

function reemplazar($numero){
   $reemplazar = str_replace(".", ",", $numero);
   echo "<p>$reemplazar</p>";
}
reemplazar(15.980340);

/* function calcularEdad($fechanac){
   
    echo "<p>$diff</p>";
}
calcularEdad("20/08/1999"); */
?>


</body>
</html>