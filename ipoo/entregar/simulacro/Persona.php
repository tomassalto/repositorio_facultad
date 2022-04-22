<?php

class Persona{

    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    private $mail;
    private $telefono;
    private $neto;

    public function __construct($nombre,$apellido,$direc,$mail,$dni,$tel,$neto){

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direc;
        $this->mail = $mail;
        $this->dni = $dni;
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

        return $this->nombre = $nombres;
    }

    public function setApellido($apellidos){

        return $this->apellido = $apellidos;
    }

    public function setDireccion($direc){

        return $this->direccion = $direc;
    }

    public function setDni($dniPersona){

        return $this->dni = $dniPersona;
    }

    public function setMail($email){

        return $this->mail = $email;
    }

    public function setTelefono($tel){

        return $this->telefono = $tel;
    }

    public function setNeto($netos){

        return $this->neto = $netos;
    }

    
}




?>