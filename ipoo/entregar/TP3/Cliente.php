<?php
class Cliente extends Persona{
    private $nroCliente;
    
    public function __construct($nombre, $apellido, $dni, $nroCliente){
        parent::__construct($nombre,$apellido,$dni);
        $this->nroCliente = $nroCliente;
    }

    public function getNroCliente(){
        return $this->nroCliente;
    }
    public function setNroCliente($nroCliente){
        $this->nroCliente = $nroCliente;
    }

    public function __toString(){
        $str = parent::__toString();
        return $str." Numero Cliente: {$this->getNroCliente()}.";
    }
}