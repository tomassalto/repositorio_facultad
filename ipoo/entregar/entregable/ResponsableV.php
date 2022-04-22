<?php

class ResponsableV{

    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombreEmpleado;
    private $apellidoEmpleado;

    public function __construct($numEmpleado,$numLicencia,$nombreEmpleado,$apellidoEmpleado){

        $this->numeroEmpleado = $numEmpleado;
        $this->numeroLicencia = $numLicencia;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->apellidoEmpleado = $apellidoEmpleado;
    }
    
    /**
     * Get the value of numeroEmpleado
     */ 
    public function getNumeroEmpleado()
    {
        return $this->numeroEmpleado;
    }

    /**
     * Set the value of numeroEmpleado
     *
     * @return  self
     */ 
    public function setNumeroEmpleado($numeroEmpleado)
    {
        $this->numeroEmpleado = $numeroEmpleado;

        return $this;
    }

    /**
     * Get the value of numeroLicencia
     */ 
    public function getNumeroLicencia()
    {
        return $this->numeroLicencia;
    }

    /**
     * Set the value of numeroLicencia
     *
     * @return  self
     */ 
    public function setNumeroLicencia($numeroLicencia)
    {
        $this->numeroLicencia = $numeroLicencia;

        return $this;
    }

    /**
     * Get the value of nombreEmpleado
     */ 
    public function getNombreEmpleado()
    {
        return $this->nombreEmpleado;
    }

    /**
     * Set the value of nombreEmpleado
     *
     * @return  self
     */ 
    public function setNombreEmpleado($nombreEmpleado)
    {
        $this->nombreEmpleado = $nombreEmpleado;

        return $this;
    }

    /**
     * Get the value of apellidoEmpleado
     */ 
    public function getApellidoEmpleado()
    {
        return $this->apellidoEmpleado;
    }

    /**
     * Set the value of apellidoEmpleado
     *
     * @return  self
     */ 
    public function setApellidoEmpleado($apellidoEmpleado)
    {
        $this->apellidoEmpleado = $apellidoEmpleado;

        return $this;
    }

    public function __toString(){
        
        return "El numero de empleado es: {$this->getNumeroEmpleado()}.\n
        El numero de licencia del empleado es: {$this->getNumeroLicencia()}.\n
        El nombre del empleado es: {$this->getNombreEmpleado()}.\n
        El apellido del empleado es: {$this->getApellidoEmpleado()}.\n";
    }
}