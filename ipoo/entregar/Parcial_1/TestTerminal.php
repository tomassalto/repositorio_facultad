<?php
require_once('Empresa.php');
require_once('Responsable.php');
require_once('Terminal.php');
require_once('Viaje.php');

$objResponsable = new Responsable("Tomas", "Salto", 42095934, "garay 1184", "tomas@salto.com", 11243481);
$objViaje = new Viaje("Cancun", 15, 20, 125, 20000, "26/03", 3, 2, $objResponsable);
$objViaje2 = new Viaje("Ney York", 14, 16, 124, 50000,"26/03", 3,1,$objResponsable);
$objEmpresa1 = new Empresa("Seabourn Cuise Line","Pepitos INC",$objViaje);
$objEmpresa2 = new Empresa("Princess", "Walmart", $objViaje2);
$objTerminal = new Terminal("MP", "Av Arg 812", $objEmpresa1);
$objTerminal2 = new Terminal("GP", "Rosas 429", $objEmpresa2);

$terminal  = $objTerminal->ventaAutomatica(3,"2606","New York", $objEmpresa1);
echo $terminal;
$terminal = $objTerminal->ventaAutomatica(3, "2509", "Cancun", $objEmpresa2);
echo $terminal;

$recaudar = $objTerminal->empresaMayorRecaudacion();
echo $recaudar;

$responsable = $objResponsable->__toString();