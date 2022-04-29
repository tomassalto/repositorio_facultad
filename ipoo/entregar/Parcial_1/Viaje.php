<?php
class Viaje{
    //atributos
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numero;
    private $importe;
    private $fecha;
    private $cantidadMaxAsientos;
    private $asientosDisponibles;
    private $objPersona;
    private $arrayPasajeros = [];

    //constructor
    public function __construct($destino,$horaPartida,$horaLlegada,$numero,$importe,$fecha,$cantidadMaxAsientos,$asientosDisponibles,$objPersona){
        $this->destino = $destino;    
        $this->horaPartida = $horaPartida;
        $this->horaLlegada = $horaLlegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->cantidadMaxAsientos = $cantidadMaxAsientos;
        $this->asientosDisponibles = $asientosDisponibles;
        $this->objPersona = $objPersona;
    }

    //getters y setters
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function getHoraPartida(){
        return $this->horaPartida;
    }
    public function setHoraPartida($horaPartida){
        $this->horaPartida = $horaPartida;
    }
    public function getHoraLlegada(){
        return $this->horaLlegada;
    }
    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada = $horaLlegada;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getImporte(){
        return $this->importe;
    }
    public function setImporte($importe){
        $this->importe = $importe;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    public function getCantidadMaxAsientos(){
        return $this->cantidadMaxAsientos;
    }
    public function setCantidadMaxAsientos($cantidadMaxAsientos){
        $this->cantidadMaxAsientos = $cantidadMaxAsientos;
    }
    public function getAsientosDisponibles(){
        return $this->asientosDisponibles;
    }
    public function setAsientosDisponibles($asientosDisponibles){
        $this->asientosDisponibles = $asientosDisponibles;
    }
    public function getObjPersona(){
        return $this->objPersona;
    }
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;
    }
    public function getArrayPasajeros(){
        return $this->arrayPasajeros;
    }
    public function setArrayPasajeros($arrayPasajeros){
        $this->arrayPasajeros = $arrayPasajeros;
    }

    //toString
    public function __toString(){
        $persona = $this->getObjPersona();
        return "Destino: {$this->getDestino()}. Hora de Partida: {$this->getHoraPartida()}. Hora de Llegada: {$this->getHoraLlegada()}. 
        Número: {$this->getNumero()}. Importe: {$this->getImporte()}. Fecha: {$this->getFecha()}. Asientos Totales: {$this->getCantidadMaxAsientos()}. 
        Asientos Disponibles: {$this->getAsientosDisponibles()}. $persona.";
    }
/**
 * esta funcion recibe como parametro la cantidad de asientos que desean asignarse y retorna un booleano
 *
 * @param $cantAsientos
 * @return boolean
 */
    public function asingarAsientosDisponibles($cantAsientos){
        $booleano = true;
        $arrayPasajeros = $this->getArrayPasajeros();
        if($cantAsientos <= count($arrayPasajeros)){
            $booleano = false;
        }
        return $booleano;
    }  
}
?>