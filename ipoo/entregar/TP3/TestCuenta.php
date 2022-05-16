<?php
include_once('Persona.php');
include_once('Cliente.php');
include_once('Cuenta.php');
include_once('CuentaCorriente.php');
include_once('CajaAhorro.php');
include_once('Banco.php');

$objCliente = new Cliente("Tomas", "Salto", 42095934, 1);
$objCliente2 = new Cliente("Rocio","Valenzuela",42000045,2);
$objCuentaCorr = new CuentaCorriente($objCliente,10000);
// $objCuentaCorr2 = new CuentaCorriente(50000,$objCliente2,100000);
$objCajaAhorro = new CajaAhorro($objCliente);
$objBanco = new Banco($objCuentaCorr,10);

$objCuentaCorr->realizarRetiro(300);
echo $objCuentaCorr."\n";

$objBanco->incorporarCliente($objCliente);
// echo $objBanco."\n";
$objBanco->incorporarCliente($objCliente2);
echo $objBanco;
// $objBanco->incorporarCuentaCorriente(2,3000);
// echo $objBanco;
