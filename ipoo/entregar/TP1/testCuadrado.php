<?php
include "Cuadrado.php";
$puntoA = [1, 6];
$puntoB = [6, 6];
$puntoC = [1, 1];
$puntoD = [6, 1];
$objCuadrado = new Cuadrado($puntoA, $puntoB, $puntoC, $puntoD);


echo "El area es: ". $objCuadrado->area();