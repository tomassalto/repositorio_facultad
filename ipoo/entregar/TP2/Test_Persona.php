<?php

include "Persona.php";
include "CuentaBancaria.php";

echo "Ingrese su nombre: ";
$nombre = trim(fgets(STDIN));
echo "Ingrese su apellido: ";
$apellido = trim(fgets(STDIN));
echo "Ingrese su tipo de documento: ";
$tipoDoc = trim(fgets(STDIN));
echo "Ingrese su numero de documento: ";
$numDoc = trim(fgets(STDIN));

$objPersona = new Persona($nombre, $apellido, $tipoDoc,$numDoc);
echo $objPersona;

//con getters y setters
// echo $objPersona->getNombre();
$objPersona->setNombre("Carlos");

// echo $objPersona->getApellido();
$objPersona->setApellido("Perez");

// echo $objPersona->getTipoDocumento();
$objPersona->setTipoDocumento("ASD");

// echo $objPersona->getNumeroDocumento();
$objPersona->setNumeroDocumento("5555555");


echo $objPersona;


?>