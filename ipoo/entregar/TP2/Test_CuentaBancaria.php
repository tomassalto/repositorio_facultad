
<?php
include "CuentaBancaria.php";
include "Persona.php";

$objCliente = new CuentaBancaria(100021, 38258043, 105000, 1.213);
$objetoPersona = new Persona("Tomasito","Salto","Dni","42095934");


echo "El número de cuenta es: " . $objCliente->getNumeroDeCuenta() . ".\n";
$objCliente->setNumeroDeCuenta(100022);


echo $objCliente->setObjPersona($objetoPersona) . ".\n";
// $objCliente->setDNIcliente(42095934);


echo "El saldo actual es de: $" . $objCliente->getSaldoActual() . ".\n";
$objCliente->setSaldoActual(11000);


echo "El interés anual es del: " . $objCliente->getInteresAnual() . "%.\n";
$objCliente->setInteresAnual(1.33);

$objCliente->actualizarSaldo();

echo $objCliente->depositar(5000);

echo $objCliente->retirar(200000);

// echo $objCliente->__toString();