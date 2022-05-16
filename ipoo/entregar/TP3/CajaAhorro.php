<?php
class CajaAhorro extends Cuenta{

    public function __construct($objPersona){
        parent::__construct($objPersona);
    }

    public function realizarRetiro($monto){        
        $booleano = false;
        if(parent::getSaldoActual() >= $monto){
            parent::realizarRetiro($monto);
            $booleano = true;
        }else{
            $booleano = false;
        }
        return $booleano;
    }
}