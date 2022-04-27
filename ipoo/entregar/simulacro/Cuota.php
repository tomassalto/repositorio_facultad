<?php

class Cuota{

    private $numero;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada;

    public function __construct($numeroCuota, $montoCuota,$montoInteres)
    {
        $this->numero = $numeroCuota;
        $this->monto_cuota = $montoCuota;
        $this->monto_interes = $montoInteres;
        $this->cancelada = 'Sin pagar';        
    }
  
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;        
    } 
    public function getMonto_cuota(){
        return $this->monto_cuota;
    }
    public function setMonto_cuota($monto_cuota){
        $this->monto_cuota = $monto_cuota;
    }
    public function getMonto_interes(){
        return $this->monto_interes;
    }
    public function setMonto_interes($monto_interes){
        $this->monto_interes = $monto_interes;       
    }
    public function getCancelada(){
        return $this->cancelada;
    }

    public function setCancelada($cancelada){
        if($cancelada){
            $final = 'Pagada';
        }else{
            $final = 'Sin pagar';
        }
        $this->cancelada = $final;
    }

    /**Metodo para convertir el valor del estado de la cuota
     * @param void
     * @return string
     */
    private function estadoCuota(){

        if($this->getCancelada() == 'Pagada'){
            $str = 'Pagada';
        }else{
            $str = 'Sin pagar';
        }
        return $str;
    }

    //toString
    public function __toString(){
        
        $str = "
        Numero de cuotas: {$this->getNumero()}. Monto de las cuotas: {$this->getMonto_cuota()}. Monto de los intereses: {$this->getMonto_interes()}. Estado de la cuota: {$this->getCancelada()}.\n
        ";
        return $str;
    }

    /**Metodo para devolver el monto final de la cuota, monto + interes
     * @param 
     * @return
     */
    public function darMontoFinalCuota(){
        $monto = $this->getMonto_cuota();
        $interes = $this->getMonto_interes();        
        $montoFinal = $monto + $interes;
        return $montoFinal;
    }  
}