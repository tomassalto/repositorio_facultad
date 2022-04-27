<?php

class Persona{

    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    public function __construct($nombre,$apellido,$dni,$direc,$mail,$tel,$neto){

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->direccion = $direc;
        $this->mail = $mail;      
        $this->telefono = $tel;
        $this->neto = $neto;
    } 

    //getters y setters

    public function getNombre(){

        return $this->nombre;
    }

    public function getApellido(){

        return $this->apellido;
    }

    public function getDireccion(){

        return $this->direccion;
    }

    public function getDni(){

        return $this->dni;
    }

    public function getMail(){

        return $this->mail;
    }

    public function getTelefono(){

        return $this->telefono;
    }

    public function getNeto(){

        return $this->neto;
    }

    public function setNombre($nombres){

       $this->nombre = $nombres;
    }

    public function setApellido($apellidos){

         $this->apellido = $apellidos;
    }

    public function setDireccion($direc){

         $this->direccion = $direc;
    }

    public function setDni($dniPersona){

         $this->dni = $dniPersona;
    }

    public function setMail($email){

         $this->mail = $email;
    }

    public function setTelefono($tel){

         $this->telefono = $tel;
    }

    public function setNeto($neto){

         $this->neto = $neto;
    }
    //toString
    public function __toString(){
        
        $str = "
        Nombre: {$this->getNombre()}. Apellido: {$this->getApellido()}. DNI: {$this->getDni()}. Dirección: {$this->getDireccion()}.
        Mail: {$this->getMail()}. Telefono: {$this->getTelefono()}. Neto: \${$this->getNeto()}.
        ";
        return $str;
    }
}


?>