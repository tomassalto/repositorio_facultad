<?php
class Login{
    //Atributos
    private $usuario;
    private $contrasenia;
    private $fraseDeSeguridadStr;
    private $arrayContraseniasViejas = ['', '', '', ''];

    //Constructot
    public function __construct($user, $pass, $frasePass){
        $this->usuario = $user;
        $this->contrasenia = $pass;
        $this->fraseDeSeguridadStr = $frasePass;
        //$this->arrayContraseniasViejas[0] = $pass;
    }

  
    //getter y setter 
    public function getUsuario(){
        return $this->usuario;
    }

    public function getContrasenia(){
        return $this->contrasenia;
    }

    public function getFrase(){
        return $this->fraseDeSeguridadStr;
    }

    public function setUsuario($nombre){
        $this->usuario = $nombre;
    }

    public function setConstrasenia($pass){
        $this->contrasenia = $pass;
    }

    public function setFrase($nuevaFrase){
        $this->fraseDeSeguridadStr = $nuevaFrase;
    }

    public function recordarFrase(){
        return $this->fraseDeSeguridadStr;
    }
    
    public function validarPass($passAValidar){
        $arrayResultado = ['validado' => false, 'passAntigua' => false];
        if($this->contrasenia === $passAValidar){
            $arrayResultado['validado'] = true;
        }elseif(in_array($passAValidar, $this->arrayContraseniasViejas)){
            $arrayResultado['passAntigua'] = true;
        };
        return $arrayResultado;
    }

  
    public function cambiarPass($nuevaPass){
        $comprobacion = ['validacionFinal' => false, 'passAntigua' => false];
        if(!in_array($nuevaPass, $this->arrayContraseniasViejas)){
            if($nuevaPass != $this->contrasenia){
                array_unshift($this->arrayContraseniasViejas, $this->contrasenia);
                $this->contrasenia = $nuevaPass;
                $this->arrayContraseniasViejas[5] = '';
                $comprobacion['validacionFinal'] = true;
            }
        }else{
            $comprobacion['passAntigua'] = true;
        };
        return $comprobacion;
    }

    
    
}