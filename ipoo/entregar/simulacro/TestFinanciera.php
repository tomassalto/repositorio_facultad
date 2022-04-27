<?php

require_once('Cuota.php');
require_once('Financiera.php');
require_once('Persona.php');
require_once('Prestamo.php');

$objFinanciera = new Financiera("Money","Av. Arg 1234");

$objPersona1 = new Persona("Pepe", "Florez",12345678, "BS AS 12", "dir@gmail.com",2994455, 40000);
$objPersona2 = new Persona("Luis", "Suarez",42095934, "Garay 1184", "salto@gmail.com",2993673, 4000);

$objPrestamo1 = new Prestamo(1, 50000, 5, 0.1, $objPersona1);
$objPrestamo2 = new Prestamo(2, 10000, 4, 0.1, $objPersona2);
$objPrestamo3 = new Prestamo(3, 10000, 2, 0.1, $objPersona2);

//3.Cargar los tres prestamos en la financiera
$objFinanciera->incorporarPrestamo($objPrestamo1);
$objFinanciera->incorporarPrestamo($objPrestamo2);
$objFinanciera->incorporarPrestamo($objPrestamo3);
//4.Realizar echo de financiera
echo $objFinanciera;

//5.metodo otorgarPrestamoSiCalifica de la financiera
$objFinanciera->otorgarPrestamoSiCalifica();
// 6.Realizar echo de financiera
echo $objFinanciera;

//7.incotar a informarCuotaPagar(2) y guardar esto en $objCuota
$objCuota = $objFinanciera->informarCuotaPagar(1);

//8.Realizar echo de objCuota
echo $objCuota;
echo "\n";

//9.Invocar darMontoFinalCuota con el obj del punto 7
$montoFinal = $objCuota->darMontoFinalCuota();
echo "Monto a pagar de dicha cuota: $montoFinal\n";

//10.invocar setCancelada(true) en el objCuota
$objCuota->setCancelada(true);

//11.invocar informarCuotaPagar(1)
$objCuota = $objFinanciera->informarCuotaPagar(1);

//12.Realizar echo de objCuota
echo "\n";
echo $objCuota;

?>