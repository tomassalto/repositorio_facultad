<?php
class CuentaBancaria{
    //Atributos
    private $numeroDeCuenta;
    // private $DNIcliente;
    private $saldoActual;
    private $interesAnual;
    private $objPersona;

    //Constructor
    public function __construct($nCuenta,$persona, $saldo, $interes){
        $this->numeroDeCuenta = $nCuenta;
        $this->objPersona = $persona;
        // $this->DNIcliente = $DNI;
        $this->saldoActual = $saldo;
        $this->interesAnual = $interes;
    }

 
    //Getters y Setters

      /**
     * Get the value of objPersona
     */ 
    public function getObjPersona()
    {
        return $this->objPersona; 
    }

    /**
     * Set the value of objPersona
     *
     * @return  self
     */ 
    public function setObjPersona($objPersona)
    {
        $this->objPersona = $objPersona;

        return $this;
    }
    public function getNumeroDeCuenta(){
        return $this->numeroDeCuenta;
    }

    public function setNumeroDeCuenta($numeroDeCuentaInt){
        $this->numeroDeCuenta = $numeroDeCuentaInt;
    }

    // public function getDNIcliente(){
    //     return $this->DNIcliente;
    // }

    // public function setDNIcliente($DNIclienteInt){
    //     $this->DNIcliente = $DNIclienteInt;
    // }

    public function getSaldoActual(){
        return $this->saldoActual;
    }

    public function setSaldoActual($saldoActualFlt){
        $this->saldoActual = $saldoActualFlt;
    }

    public function getInteresAnual(){
        return $this->interesAnual;
    }

    public function setInteresAnual($interesAnualFlt){
        $this->interesAnual = $interesAnualFlt;
    }

   
    public function actualizarSaldo(){
        $interesDiario = (($this->interesAnual - 1)/ 365)+1;
        $this->saldoActual *= $interesDiario;
    }


    public function depositar($cant){
        $this->saldoActual += $cant;
        $resultado = "Acaba de depositar $cant y su saldo actual es $this->saldoActual.\n";
        return $resultado;
    }

   
    public function retirar($cant){
        $strRespuesta = '';
        if($this->saldoActual < $cant){
            $strRespuesta = "No puede retirar dicha cantidad, su saldo actual es de: \$$this->saldoActual.\n";
        }else{
            $this->saldoActual -= $cant;
            $strRespuesta = "Usted ha retirado \$$cant y su saldo restante es de \$$this->saldoActual.\n";
        };
        return $strRespuesta;
    }

    //Metodo toString
    public function __toString(){
        $strCuentaTotal = "Número de cuenta: {$this->getNumeroDeCuenta()}.\n
        {$this->getObjPersona()}.\n
        Saldo actual: \${$this->getSaldoActual()}.\n
        Interés anual: {$this->getInteresAnual()}.\n";
        return $strCuentaTotal;
    }

  
}
