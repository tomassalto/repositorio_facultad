<?php

class Persona{

    //atributos
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $numeroDocumento;

    //constructor
    public function __construct($nombreP,$apellidoP,$tipoDoc, $numDoc){
        
        $this->nombre = $nombreP;
        $this->apellido = $apellidoP;
        $this->tipoDocumento = $tipoDoc;
        $this->numeroDocumento = $numDoc;
    }
    
    //getters y setters
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
     * Get the value of tipoDocumento
     */ 
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * Set the value of tipoDocumento
     *
     * @return  self
     */ 
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    /**
     * Get the value of numeroDocumento
     */ 
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * Set the value of numeroDocumento
     *
     * @return  self
     */ 
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;

        return $this;
    }

    public function __toString(){
        
        $string ="\nDatos de la persona: \n \n
        Nombre: {$this->getNombre()}.\n
        Apellido: {$this->getApellido()}.\n
        Tipo de Documento: {$this->getTipoDocumento()}.\n
        Numero de documento: {$this->getNumeroDocumento()}.\n";
        return $string;
    }
}



?>