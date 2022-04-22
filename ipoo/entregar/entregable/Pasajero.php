<?php

class Pasajero{

    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;
    
    public function __construct($nombre, $apellido, $numDoc,$telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDocumento = $numDoc;
        $this->telefono = $telefono;
    }

    
    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido
     */ 
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */ 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of numDocumento
     */ 
    public function getNumDocumento()
    {
        return $this->numDocumento;
    }

    /**
     * Set the value of numDocumento
     *
     * @return  self
     */ 
    public function setNumDocumento($numDocumento)
    {
        $this->numDocumento = $numDocumento;

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function __toString(){
        
        return "El nombre del pasajero es: {$this->getNombre()}.\n
        El apellido del pasajero es: {$this->getApellido()}.\n
        El numero de documento del pasajero es: {$this->getNumDocumento()}.\n
        El telefono del pasajero es: {$this->getTelefono()}.";
    }
}