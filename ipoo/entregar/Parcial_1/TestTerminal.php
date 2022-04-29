<?php
require_once('Empresa.php');
require_once('Responsable.php');
require_once('Terminal.php');
require_once('Viaje.php');

$objResponsable = new Responsable("Tomas", "Salto", 42095934, "garay 1184", "tomas@salto.com", 11243481);
$objViaje = new Viaje(1234,"Cancun", 10, $objResponsable);
$objViaje2 = new Viaje(1235, "New York", 5, $objResponsable);
$objEmpresa1 = new Empresa("Seabourn Cuise Line","Pepitos INC",$objViaje);
$objEmpresa2 = new Empresa("Princess", "Walmart", $objViaje2);
$objTerminal = new Terminal("MP", "Av Arg 812", $objEmpresa1);
$objTerminal2 = new Terminal("GP", "Rosas 429", $objEmpresa2);

$terminal  = $objTerminal->ventaAutomatica(3,"26/06","New York", $objEmpresa1);
echo $terminal;
$terminal = $objTerminal->ventaAutomatica(3, "25/09", "Cancun", $objEmpresa2);
echo $terminal;

$recaudar = $objTerminal->empresaMayorRecaudacion();
echo $recaudar;

$responsable = $objResponsable->__toString();