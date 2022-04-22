<?php

include "Disquera.php";

echo "Ingrese la hora de apertura: ";
$apertura = trim(fgets(STDIN));
echo "Ingrese la hora de cierre: ";
$cierre = trim(fgets(STDIN));
echo "Ingrese el estado: ";
$estado = trim(fgets(STDIN));
echo "Ingrese la direccion: ";
$direccion = trim(fgets(STDIN));

$objDisquera = new Disquera($apertura, $cierre, $estado, $direccion, "Tomas", "Salto", "DNU", "42095934");
$objPersonaje = new Persona("Tomasito", "Saltito", "DNA", "412313134");
echo $objDisquera;
echo $objPersonaje;







?>