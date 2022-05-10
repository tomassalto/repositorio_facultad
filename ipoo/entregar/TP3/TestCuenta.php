<?php
include('Persona.php');
include('Cliente.php');
include('Cuenta.php');
include('CuentaCorriente.php');
include('CajaAhorro.php');

$objCliente = new Cliente("Tomas", "Salto", 42095934, 1);
$objCuentaCorr = new CuentaCorriente(6000,$objCliente,10000);
$objCajaAhorro = new CajaAhorro(40000, $objCliente);

$objCuentaCorr->realizarRetiro(300);
echo $objCuentaCorr;