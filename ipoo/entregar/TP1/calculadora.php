<?php
 
class calculadora{
  private $num1;
  private $num2;
  private $resultado;

  public function __construct($primerNumero,$segundoNumero)
  {
    $this ->num1 = $primerNumero;
    $this ->num2 = $segundoNumero;
  }

  public function getPrimero(){
    return $this->num1;
  }

  public function getSegundo(){
    return $this->num2;
  }

  public function setPrimero($num1In){
    return $this->num1 = $num1In;
  }

  public function setSegundo($num2In)
  {
    return $this->num2 = $num2In;
  }
  public function suma()
  {
    $this -> resultado = $this-> getPrimero() + $this-> getSegundo();
    return $this->resultado;
  }
  public function resta(){
    $this->resultado = $this->getPrimero() - $this->getSegundo();
    return $this->resultado;
  }

  public function division(){
    $this->resultado = $this->getPrimero() / $this->getSegundo();
    return $this->resultado;
  }

  public function multiplicar(){
    $this->resultado = $this->getPrimero() * $this->getSegundo();
    return $this->resultado;
  }
  public function __toString()
    {
        return "Resultado: ".$this->resultado;
    }
}

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
?>

 