<?php
class Cafetera{
    //Atributos
    private $capacidadMax;
    private $cantidadActual;

    //Constructor
    public function __construct($contenidoMaximo, $cantidadUtilizada){
        $this->capacidadMax = $contenidoMaximo;
        $this->cantidadActual = $cantidadUtilizada;        
    }

   
    //getters y setters
    public function getCapacidadMaxima(){
        return $this->capacidadMax;
    }

    public function setCapacidadMaxima($capacidadMaxima){
        $this->capacidadMax = $capacidadMaxima;
    }

    public function getCantidadActual(){
        return $this->cantidadActual;
    }

    public function setCantidadActual($cantidadActual){
        $this->cantidadActual = $cantidadActual;
    }

    
    public function llenarCafetera(){
        $this->cantidadActual = $this->capacidadMax;
    }

  
    public function servirTaza($cantidad){
        $strResolucion = '';
        if($this->cantidadActual >= $cantidad){
            $this->cantidadActual -= $cantidad;
            $strResolucion = "La taza ha sido llenada, restan $this->cantidadActual ml en la cafetera.\n";
        }else{
            $strResolucion = "El contenido de la cafetera no ha podido llenar la taza, solo se han cargado $this->cantidadActual ml.\n";
            $this->cantidadActual = 0;
        };
        return $strResolucion;
    }

    public function vaciarCafetera(){
        $this->cantidadActual = 0;
    }

    public function agregarCafe($cantidad){
        $this->cantidadActual += $cantidad;
        $strRespuesta = '';
        if($this->cantidadActual >= $this->capacidadMax){
            $resto = $this->cantidadActual - $this->capacidadMax;
            $strRespuesta = "La cafetera se ha llenado y se han derramado $resto ml.\n";
        }else{
            $strRespuesta = "La cafetera ahora posee $this->cantidadActual ml.\n";
        };
        return $strRespuesta;
    }

    //Metodo toString
    public function __toString(){
        $strDevuelto = "La cafetera tiene una capacidad máxima de $this->capacidadMax ml y posee $this->cantidadActual ml.\n";
        return $strDevuelto;
    }


}