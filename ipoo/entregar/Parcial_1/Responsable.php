<?php
class Responsable{
//atributos
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $direccion;
    private $mail;
    private $telefono;

    //constructor
    public function __construct($nombre,$apellido,$numDocumento,$direccion,$mail,$telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDocumento = $numDocumento;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;        
    }

    //getters y setters
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getNumDocumento(){
        return $this->numDocumento;
    }
    public function setNumDocumento($numDocumento){
        $this->numDocumento = $numDocumento;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
//toString
    public function __toString(){
        
        return "Nombre: {$this->getNombre()}. Apellido: {$this->getApellido()}. DNI: {$this->getNumDocumento()}.
        Dirección: {$this->getDireccion()}. Mail: {$this->getMail()}. Telefono: {$this->getTelefono()}.";
    }
}
?>