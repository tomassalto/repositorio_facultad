<?php
include "Persona.php";
class Disquera{

    private $hora_desde;
    private $hora_hasta;
    private $estado;
    private $direccion;
    private $dueño;

    public function __construct($horaIncio, $horaFinal, $estado, $direccion, $nombre, $apellido, $tipoDoc, $numDoc){

        $this->hora_desde = $horaIncio;
        $this->hora_hasta = $horaFinal;
        $this->estado = $estado;
        $this->direccion = $direccion;
        $this->dueño = new Persona($nombre,$apellido,$tipoDoc,$numDoc);

    }

    /**
     * Get the value of hora_desde
     */ 
    public function getHora_desde()
    {
        return $this->hora_desde;
    }

    /**
     * Set the value of hora_desde
     *
     * @return  self
     */ 
    public function setHora_desde($hora_desde)
    {
        $this->hora_desde = $hora_desde;

        return $this;
    }

    /**
     * Get the value of hora_hasta
     */ 
    public function getHora_hasta()
    {
        return $this->hora_hasta;
    }

    /**
     * Set the value of hora_hasta
     *
     * @return  self
     */ 
    public function setHora_hasta($hora_hasta)
    {
        $this->hora_hasta = $hora_hasta;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of dueño
     */ 
    public function getDueño()
    {
        return $this->dueño->__toString();
    }

    /**
     * Set the value of dueño
     *
     * @return  self
     */ 
    public function setDueño($nombre, $apellido, $tipoDocumento, $numeroDocumento)
    {
        $objPersona = $this->dueño;
        $objPersona->setNombre($nombre);
        $objPersona->setApellido($apellido);
        $objPersona->setTipoDocumento($tipoDocumento);
        $objPersona->setNumeroDocumento($numeroDocumento);

        
    }

    //funciones
    public function dentroHorarioAtencion($horas, $minutos){
        $horarioAtencion = false;
        if($minutos != 0){
            $horas++;
        }
        if($horas < $this->getHora_desde() && $horas > $this->getHora_hasta()){
            $horarioAtencion = true;
        }
        return $horarioAtencion;
    }

    public function abrirDisquera($horas, $minutos){
        $horario = $this->dentroHorarioAtencion($horas, $minutos);

        if($horario){
            $this->setEstado("Abierto!");
        }
    }

    public function cerrarDisquera($horas, $minutos){
        $horario = $this->dentroHorarioAtencion($horas, $minutos);

        if($horario == false){
            $this->setEstado("Cerrado!");
        }
    }

    public function __toString(){

        $objPersona = $this->getDueño();

        $string = "El horario de apertura es: {$this->getHora_desde()}.\n
        El horario de cierre es: {$this->getHora_hasta()}.\n
        El estado es: {$this->getEstado()}.\n
        La direccion es: {$this->getDireccion()}.\n".$objPersona;

        return $string;
    }
}
?>
