<?php
require_once('Viaje.php');
require_once('Empresa.php');
class Terminal{
    private $denominacion;
    private $direccion;
    private $coleccionEmpresas = [];

    public function __construct($denominacion,$direccion,$coleccionEmpresas){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionEmpresas = $coleccionEmpresas;
    }  

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getColeccionEmpresas(){
        return $this->coleccionEmpresas;
    }
    public function setColeccionEmpresas($coleccionEmpresas){
        $this->coleccionEmpresas = $coleccionEmpresas;
    }

    private function empresasString(){
        $str = '';
        $coleccionEmpresas = $this->getColeccionEmpresas();
        foreach ($coleccionEmpresas as $key => $value) {
            $empresaString = $value->__toString();
            $str .= $empresaString;
        }
        return $str;
    }

    public function __toString()
    {
        $empresa = $this->empresasString();
        return "Denominacion: {$this->getDenominacion()}. Direccion: {$this->getDireccion()}. $empresa.";
    }

    public function ventaAutomatica($cantAsientos, $fecha, $destino, $objEmpresa){
       $arrayEmpresas = $this->getColeccionEmpresas();
       $booleano = true;
       $i = 0;
       while($booleano && $i <= count($arrayEmpresas)){
            $viajeSeleccionado = $arrayEmpresas[$i];
            $venta = $viajeSeleccionado->venderViajeADestino($cantAsientos,$destino);
            if($venta){
                $booleano = false;
            }
        $i++;    
       }
       
    }

    public function empresaMayorRecaudacion(){
        $arrayEmpresas = $this->getColeccionEmpresas();
        foreach($arrayEmpresas as $key => $value){
            $empresa = $value;
            $seleccionarEmpresa = $empresa->montoRecaudado();
            $empresaReacudacion =  max($seleccionarEmpresa);
            
        }
        return $empresaReacudacion;
    }
}
?>