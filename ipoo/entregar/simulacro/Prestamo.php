<?php
require_once('Cuota.php') ;
require_once('Persona.php');
class Prestamo{
    private $identificacion;
    private $codigoElectrodomestico;
    private $fechaOtorgamiento = 'No aprobado.';
    private $monto;
    private $cantidadCuotas;
    private $tazaInteres;
    private $coleccionCuotas = [];
    private $objPersona;
    
    public function __construct($identificacion,$monto,$cantCuotas,$tazaInteres,$objPersona){        
        $this->identificacion = $identificacion;
        $this->monto = $monto;
        $this->cantidadCuotas = $cantCuotas;
        $this->tazaInteres = $tazaInteres;
        $this->objPersona = $objPersona;
    }
    
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;       
    }
    public function getCodigoElectrodomestico(){
        return $this->codigoElectrodomestico;
    }  
    public function setCodigoElectrodomestico($codigoElectrodomestico){
        $this->codigoElectrodomestico = $codigoElectrodomestico;      
    }    
    public function getFechaOtorgamiento(){
        return $this->fechaOtorgamiento;
    }
    public function setFechaOtorgamiento($fechaOtorgamiento){
        $this->fechaOtorgamiento = $fechaOtorgamiento;
    } 
    public function getMonto(){
        return $this->monto;
    }
    public function setMonto($monto){
        $this->monto = $monto;      
    }
    public function getCantidadCuotas(){
        return $this->cantidadCuotas;
    }
    public function setCantidadCuotas($cantidadCuotas){
        $this->cantidadCuotas = $cantidadCuotas;      
    } 
    public function getTazaInteres(){
        return $this->tazaInteres;
    }   
    public function setTazaInteres($tazaInteres){
        $this->tazaInteres = $tazaInteres;     
    }
    public function getColeccionCuotas(){
        return $this->coleccionCuotas;
    }
    public function setColeccionCuotas($coleccionCuotas){
        $this->coleccionCuotas = $coleccionCuotas;     
    }   
    public function getObjPersona(){
        return $this->objPersona;
    }    
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;       
    }

      /**Metodo para imprimir la coleccion de cuotas
     * @param void
     * @return string
     */
    private function cuotasString(){
        $str = '';
        $arrayCuotas = $this->getColeccionCuotas();
        if(count($arrayCuotas) == 0){
            $str = 'Préstamo no aprobado';
        }else{
            foreach ($arrayCuotas as $key => $value) {
                $cuota = $value->__toString();
                $str .= $cuota;
            }
        }
        return $str;
    }

    //tostring
    public function __toString()
    {
        $str = "        
        Id: {$this->getIdentificacion()}. Codigo producto: {$this->getCodigoElectrodomestico()}. Fecha: {$this->getFechaOtorgamiento()}. Monto: {$this->getMonto()}. Cuotas: {$this->getCantidadCuotas()}. Interes: {$this->getTazaInteres()}.";        
        $objPersona = $this->getObjPersona();
        $personaString = $objPersona->__toString();
        $coutasString = $this->cuotasString();        
        $str .= $personaString;
        $str .= 'Coleccion Cuotas: ';
        $str .= $coutasString;
        return $str;        
    }

       /**Metodo para generar las cuotas
     * @param void
     * @return void
     */
    private function generarCuota(){
        $monto = $this->getMonto();
        $cantCuotas = $this->getCantidadCuotas();
        $montoCuota = $monto / $cantCuotas;
        $arrayCuotas = [];
        for($i = 1; $i <= $cantCuotas; $i++){
            $interes = $this->calcularInteresPrestamo($i);
            $cuota = new Cuota($i,$montoCuota,$interes);
            $arrayCuotas[$i] = $cuota;
        }
        $this->setColeccionCuotas($arrayCuotas);
    }

      /**Metodo para calcular el interes de cada cuota
     * @param int $numCuota
     * @return float
     */
    private function calcularInteresPrestamo($numCuota){
        $monto = $this->getMonto();
        $cantCuotas = $this->getCantidadCuotas();
        $montoPorCuota = $monto / $cantCuotas;
        $tazaInteres = $this->getTazaInteres();       
        $interes = ($monto- ((($montoPorCuota)*($numCuota-1)))) * ($tazaInteres/10);
        return $interes;
    }

       /**Metodo para aprobar el préstamo 
     * @param void
     * @return void
    */
    public function otorgarPrestamo(){ 
        $instancia = $this->obtenerFecha();
        $this->setFechaOtorgamiento($instancia);
        $this->generarCuota();

    }

     /**Metodo para devolver la fecha en formato dd/mm/aaaa 
     * @param void
     * @return string
    */
    private function obtenerFecha(){
        $arrayFecha = getdate();
        $dia = $arrayFecha['mday'];
        $mes = $arrayFecha['mon'];
        $anio = $arrayFecha['year'];
        $string = "$dia/$mes/$anio";
        return $string;
    }

       /**Metodo para obtener siguiente cuota
     * @param void
     * @return int 
     */
    public function darSiguienteCuotaPagar(){
        $arrayCuotas = $this->getColeccionCuotas();
        $cuotaSeleccionada = [];
        $estado = true;
        foreach($arrayCuotas as $key => $value){
            if($estado){
                $cuota = $value;
                $estadoCuota = $cuota->getCancelada();
                if($estadoCuota == 'Sin pagar'){
                    $estado = false;
                    $cuotaSeleccionada = $value;
                }
            }
        }
        return $cuotaSeleccionada;
    }
}