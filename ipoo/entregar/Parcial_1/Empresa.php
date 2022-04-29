<?php
class Empresa{
    //atributos
    private $identificacion;
    private $nombre;
    private $coleccionViajes = [];

    //constructor
    public function __construct($identificacion, $nombre, $coleccionViajes){
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->coleccionViajes = $coleccionViajes;        
    }
    //getters y setters
    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getColeccionViajes(){
        return $this->coleccionViajes;
    }
    public function setColeccionViajes($coleccionViajes){
        $this->coleccionViajes = $coleccionViajes;
    }

    private function viajesString(){
        $str = '';
        $coleccionViajes = $this->getColeccionViajes();
        foreach ($coleccionViajes as $key => $value) {
            $viajeString = $value->__toString();
            $str .= $viajeString;
        }
        return $str;
    }

    public function __toString(){
        $viaje = $this->viajesString();
        return "ID: {$this->getIdentificacion()}. Nombre: {$this->getNombre()}. $viaje.";
    }

    public function darViajeADestino($destino,$cantAsientos){
        $arrayViajes = $this->getColeccionViajes();
        $viajeSeleccionado = [];
        foreach($arrayViajes as $key => $value){
            $objViaje = $value;
            $destinoSeleccionado = $objViaje->getDestino();
            if($destinoSeleccionado == $destino){
                $asientosDisponibles = $objViaje->asignarAsientosDisponibles($cantAsientos);
                if($asientosDisponibles){
                    $viajeSeleccionado = $value;
                }
            }
        }
        return $viajeSeleccionado;
    }

    public function incorporarViaje($objViaje){
        $arrayViajes = $this->getColeccionViajes();
        $booleano = true;
        $i=0;
        $destinoEncontrado = $objViaje->getDestino();
        $horaSalidaEncontrada = $objViaje->getHoraPartida();
        $horaLlegadaEncontrada = $objViaje->getHoraLlegada();
        while($booleano && $i <= count($arrayViajes)){
            $viajeSeleccionado = $arrayViajes[$i];
            if($viajeSeleccionado == $destinoEncontrado){
                if($horaSalidaEncontrada == $viajeSeleccionado){
                    if($horaLlegadaEncontrada == $viajeSeleccionado){
                        $booleano = false;
                    }
                }
            }else{
                $this->setColeccionViajes($objViaje);
                $booleano = false;
               
            }
            
            $i++;
        }
        return $booleano;
    }

    public function venderViajeADestino($cantAsientos, $destino){
        $arrayViajes = $this->getColeccionViajes();
        $nuevoViaje = $this->darViajeADestino($cantAsientos,$destino);
        if($nuevoViaje){
            array_push($arrayViajes,$nuevoViaje);
            $nuevoViaje->__toString();
        }else{
            $nuevoViaje = null;
        }
        
        return $nuevoViaje;
    }

    public function montoRecaudado(){
        $arrayViajes = $this->getColeccionViajes();
        foreach($arrayViajes as $key => $value){
            $objViaje = $value;
            $importe = $objViaje->getImporte();
            $cantMaxAsientos = $objViaje->getCantidadMaxAsientos();
            $asientosDisponibles = $objViaje->getAsientosDisponibles();
            $asientosOcupados = $cantMaxAsientos - $asientosDisponibles;
            $montoReacuado = $importe * $asientosOcupados;
            
        }
        return $montoReacuado;
    }

}
?>