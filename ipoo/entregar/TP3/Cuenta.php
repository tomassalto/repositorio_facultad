<?php
class Cuenta{
    private $saldoActual;
    private $objPersona;

    public function __construct($saldoActual,$objPersona){
        $this->saldoActual = $saldoActual;
        $this->objPersona = $objPersona;
    }

    public function getSaldoActual(){
        return $this->saldoActual;
    }
    public function setSaldoActual($saldoActual){
        $this->saldoActual = $saldoActual;
    }
    public function getObjPersona(){
        return $this->objPersona;
    }
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;
    }

    public function __toString(){
    return
"Saldo actual: {$this->getSaldoActual()}.\n
Cliente de la cuenta:\n \n {$this->getObjPersona()}.";
    }

/**
 * retorna el saldo actual de la cuenta
 *
 * @return float
 */
    public function saldoCuenta(){
        return $this->getSaldoActual();
    }

    public function realizarDeposito($monto){
        $saldo = $this->getSaldoActual();
        $nuevoSaldo = $saldo + $monto;
        $this->setSaldoActual($nuevoSaldo);
    }

    public function realizarRetiro($monto){
        $saldo = $this->getSaldoActual();
        $nuevoSaldo = $saldo - $monto;
        $this->setSaldoActual($nuevoSaldo);         
    }
}