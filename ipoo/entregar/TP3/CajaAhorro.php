<?php
class CajaAhorro extends Cuenta{

    public function __construct($saldoActual,$objPersona){
        parent::__construct($saldoActual,$objPersona);
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