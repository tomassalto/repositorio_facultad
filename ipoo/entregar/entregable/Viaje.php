<?php

class Viaje{

    private $codigoViaje;
    private $destino;
    private $cantPasajeros;
    private $arrayPasajeros = [];
    private $responsableViaje;

    // construct
    public function __construct($codigo, $destinoViaje, $cantidadPasajeros, $objResponsable){
        
        $this->codigoViaje = $codigo;
        $this->destino = $destinoViaje; 
        $this->cantPasajeros = $cantidadPasajeros;
        $this->responsableViaje = $objResponsable;

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

    
    /**
     * Get the value of responsableViaje
     */ 
    public function getResponsableViaje()
    {
        return $this->responsableViaje;
    }

    /**
     * Set the value of responsableViaje
     *
     * @return  self
     */ 
    public function setResponsableViaje($responsableViaje)
    {
        $this->responsableViaje = $responsableViaje;

        return $this;
    }
    //funciones 

    public function pasajerosStr(){
        $string = "";
        foreach($this->getArrayPasajeros() as $key => $value){
            $objPasajero = $value;
            $stringPasajero = $objPasajero->__toString();
            $string.=$stringPasajero;
        }
        return $string;
    }

    public function modificarDatosPasajero($dni){
        $boolean = false;
        $array = $this->getArrayPasajeros();
        $count = count($array);
        $noEncontrado = true;
        $i = 0;
        $posicion = 0;

        while($noEncontrado && $i < $count){
            $pasajeroSeleccionado = $array[$i];
            $dniSeleccionado = $pasajeroSeleccionado->getNumDocumento();
            if($dniSeleccionado == $dni){
                $noEncontrado = false;
                $posicion = $i;
                $boolean = true;
            }
            $i++;
        }
        if(!$noEncontrado){
            $objPasajero = $array[$posicion];
            $this->menuModificar($objPasajero);
            $array[$posicion] = $objPasajero;
        }

        return $boolean;
    }

    public function consultarLugar(){

        $booleano = true;
        if($this->getPasajerosMax() <= (count($this->getArrayPasajeros()))){
            $booleano = false;
        }
        return $booleano;
    }

    public function agregarPasajero($objPasajero){

        $booleano = false;
        $array = $this->getArrayPasajeros();
        $count = count($array);
        $noEncontrado = true;
        $i = 0;

        $compararDni = $objPasajero->getNumDocumento();
        while($noEncontrado && $i < $count){
            $pasajeroSeleccionado = $array[$i];
            $dniSeleccionado = $pasajeroSeleccionado->getNumDocumento();
            if($dniSeleccionado == $compararDni){
                $noEncontrado = false;
            }
            $i++;
        }

        if($noEncontrado){
            $booleano = true;
            $contador = count($array);
            if($contador == 0){
                $array[0] = $objPasajero;
            
            }else{
                $array[$contador] = $objPasajero;
            }
            $this->setArrayPasajeros($array);
        }else{
            $booleano = false;
        }  

        // if(in_array($pasajero, $this->getArrayPasajeros())){
        //     $booleano = false;
        // }else{
        //     array_push($array, $pasajero);
        //     $this->setArrayPasajeros($array);
        //     $booleano = true;
        
        return $booleano;
    }

    public function eliminarPasajero($dni){

        $booleano = false;
        $array = $this->getArrayPasajeros();
        $posicion = 0;
        $i = 0;
        $noEncontrado = true;

        while($noEncontrado || $i < count($array)){
            $pasajeroSeleccionado = $array[$i];
            $dniSeleccionado = $pasajeroSeleccionado->getNumDocumento();
            if($dniSeleccionado == $dni){
                $noEncontrado = false;
                $posicion = $i;
            }
            $i++;
        }

        if(!$noEncontrado){
            $arrayVacio = [];
            foreach($array as $key => $value){
                $count = count($arrayVacio);
                if($posicion != $key){
                    if($count == 0){
                        $arrayVacio[0] = $value; 
                    }else{
                        $arrayVacio[$count] = $value;
                    }
                }
            }
            $this->setArrayPasajeros($arrayVacio);
            $booleano = true;
        }else{
            $booleano = false;
        }

        // if(in_array($pasajero, $array)){
        //     $clave = array_search($pasajero, $array);
        //     array_splice($array, $clave, 1);
        //     $this->setArrayPasajeros($array);
        //     $booleano = true;
        // }
        return $booleano;
    }

    private function menuModificar($objPasajero){
        $menuModificar = "
        1. Modificar nombre.\n
        2. Modificar apellido.\n
        3. Modificar dni.\n
        4. Modificar telefono.\n
        5. Ver datos.\n
        6. Salir.\n";
        $salir = true;
        do {
            echo $menuModificar;
            $seleccion = trim(fgets(STDIN));
            switch ($seleccion) {
                case '1':
                    echo "Ingrese el nuevo nombre: \n";
                    $nuevoNombre = trim(fgets(STDIN));
                    $objPasajero->setNombre($nuevoNombre);
                    break;

                case '2':
                    echo "Ingrese el nuevo apellido: \n";
                    $nuevoApellido = trim(fgets(STDIN));
                    $objPasajero->setApellido($nuevoApellido);
                    break;

                case '3':
                    echo "Ingrese el nuevo dni: \n";
                    $nuevoDni = intval(trim(fgets(STDIN)));
                    $objPasajero->setNumDni($nuevoDni);
                    break;

                case '4':
                    echo "Ingrese el nuevo telefono: \n";
                    $nuevoTelefono = trim(fgets(STDIN));
                    $objPasajero->setTelefono($nuevoTelefono);
                    break;

                case '5':
                    echo $objPasajero;
                    break;
                
                default:
                    $salir = false;
                    break;
            }
        } while ($salir);
        return $objPasajero;
    }

    public function __toString(){

        $pasajero = $this->pasajerosStr();
        $arrayDePasajeros = $this->getArrayPasajeros();
        $responsable = $this->getResponsableViaje();
        $responsableStr = $responsable->__toString();
        $cantidadPasajeros = count($arrayDePasajeros);
        $string = "
        Viaje: {$this->getCodigo()}.\n
        Destino: {$this->getDestino()}.\n
        Capacidad: {$this->getPasajerosMax()}.\n
        Asientos ocupados: {$cantidadPasajeros}.\n
        Datos de responsable: {$responsableStr}.\n
        Datos de pasajeros: $pasajero.\n";

        return $string;

        
    }


}


?>