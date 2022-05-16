<?php
class CuentaCorriente extends Cuenta{     
    private $saldoMax;

    public function __construct($objPersona,$saldoMax){
        parent::__construct($objPersona);
        $this->saldoMax = $saldoMax;
    }

    public function getSaldoMax(){
        return $this->saldoMax;
    }
    public function setSaldoMax($saldoMax){
        $this->saldoMax = $saldoMax;
    }

    public function realizarRetiro($monto){
        $saldoMax = $this->getSaldoMax() + parent::getSaldoActual();
        $booleano = false;
        if($monto <= $saldoMax){
           parent::realizarRetiro($monto);
           $booleano = true;
        }else{
            $booleano = false;
        }
        return $booleano;
    }

    public function __toString(){
        $str = parent::__toString();
        return "El monto maximo para retirar es: \${$this->getSaldoMax()}.\n
        $str";
    }
}
