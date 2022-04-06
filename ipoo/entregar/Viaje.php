<?php

class Viaje{

    private $codigoViaje;
    private $destino;
    private $cantPasajeros;
    private $arrayPasajeros = [];

    // construct
    public function __construct($codigo, $destinoViaje, $cantidadPasajeros){
        
        $this->codigoViaje = $codigo;
        $this->destino = $destinoViaje; 
        $this->cantPasajeros = $cantidadPasajeros;

    }

    //getters y setters

    public function getCodigo(){

        return $this->codigoViaje;
    }

    public function setCodigo($codigoViajeInt){

        return $this->codigoViaje = $codigoViajeInt;
    }

    public function getPasajerosMax(){

        return $this->cantPasajeros;
    }

    public function setPasajerosMax($cantidadPasajeros){

        return $this->cantPasajeros = $cantidadPasajeros;
    }

    public function getDestino(){

        return $this->destino;
    }

    public function setDestino($destinoViaje){

        return $this->destino = $destinoViaje;
    }

    public function getArrayPasajeros(){

        return $this->arrayPasajeros;
    }

    public function setArrayPasajeros($arrayPasajeros){

        $this->arrayPasajeros = $arrayPasajeros;
    }

    //funciones 

    public function pasajerosStr(){
        $string = "";
        foreach($this->getArrayPasajeros() as $key => $value){
            $nombre = $value['nombre'];
            $apellido = $value['apellido'];
            $dni = $value['DNI'];
            $string .= "
            Nombre: $nombre.\n
            Apellido: $apellido.\n
            DNI: $dni.\n";

        }
        return $string;
    }

    public function modificarDatosPasajero($pasajero, $pasajero2){
        $boolean = false;
        $array = $this->getArrayPasajeros();
        if(in_array($pasajero, $array)){            
            $key = array_search($pasajero, $array);
            $array[$key] = $pasajero2;
            $this->setArrayPasajeros($array);            
            $boolean = true;
        };
        return $boolean;
    }

    public function consultarLugar(){

        $booleano = true;
        if($this->getPasajerosMax() <= (count($this->getArrayPasajeros()))){
            $booleano = false;
        }
        return $booleano;
    }

    public function agregarPasajero($pasajero){

        $booleano = false;
        $array = $this->getArrayPasajeros();
        if(in_array($pasajero, $this->getArrayPasajeros())){
            $booleano = false;
        }else{
            array_push($array, $pasajero);
            $this->setArrayPasajeros($array);
            $booleano = true;
        }
        return $booleano;
    }

    public function eliminarPasajero($pasajero){

        $booleano = false;
        $array = $this->getArrayPasajeros();
        if(in_array($pasajero, $array)){
            $clave = array_search($pasajero, $array);
            array_splice($array, $clave, 1);
            $this->setArrayPasajeros($array);
            $booleano = true;
        }
        return $booleano;
    }

    public function __toString(){

        $pasajero = $this->pasajerosStr();
        $arrayDePasajeros = $this->getArrayPasajeros();
        $cantidadPasajeros = count($arrayDePasajeros);
        $string = "
        Viaje: {$this->getCodigo()}.\n
        Destino: {$this->getDestino()}.\n
        Capacidad: {$this->getPasajerosMax()}.\n
        Asientos ocupados: {$cantidadPasajeros}.\n
        Datos de pasajeros: $pasajero.\n";

        return $string;

        
    }

}


?>