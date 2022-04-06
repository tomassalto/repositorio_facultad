<?php

include "Calculadora.php";

$calcular = new calculadora(0,0);
$operar = "";

echo "Ingrese la operacion que quiere realizar: ";
$operar = trim(fgets(STDIN));

switch ($operar){
  case '+':
    echo "Ingrese el primer numero: ";
    $calcular->setPrimero(trim(fgets(STDIN)));
    echo "Ingrese el segundo numero: ";
    $calcular->setSegundo(trim(fgets(STDIN)));
    $calcular->suma();
    echo $calcular -> __toString();
    break;

    case '-':
    echo "Ingrese el primer numero: ";
    $calcular->setPrimero(trim(fgets(STDIN)));
    echo "Ingrese el segundo numero: ";
    $calcular->setSegundo(trim(fgets(STDIN)));
    $calcular->resta();
    echo $calcular -> __toString();
    break;

    case '/':
    echo "Ingrese el primer numero: ";
    $calcular->setPrimero(trim(fgets(STDIN)));
    echo "Ingrese el segundo numero: ";
    $calcular->setSegundo(trim(fgets(STDIN)));
    $calcular->division();
    echo $calcular -> __toString();
    break;

    case '*':
    echo "Ingrese el primer numero: ";
    $calcular->setPrimero(trim(fgets(STDIN)));
    echo "Ingrese el segundo numero: ";
    $calcular->setSegundo(trim(fgets(STDIN)));
    $calcular->multiplicar();
    echo $calcular -> __toString();
    break;
  
}