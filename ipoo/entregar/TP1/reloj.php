<?php
//clase reloj
class Reloj{
    private $horas;
    private $minutos;
    private $segundos;

    //constructor
    public function __construct($horas,$minutos,$segundos){
        
        $this->horas = $horas;
        $this->minutos = $minutos;
        $this->segundos = $segundos;
    }

    // setters
    public function setHora($horasReloj){
       return $this->horas = $horasReloj;
    }

    public function setMinutos($minutosReloj){
        return $this->minutos = $minutosReloj;
     }

    public function setSegundos($segReloj){
        return $this->segundos = $segReloj;
     }

    //getters 
    public function getHoras(){
        return $this->horas;
    }
    public function getMinutos(){
        return $this->minutos;
    }
    public function getSegundos(){
        return $this->segundos;
    }

    //poner en cero el reloj
    public function ponerEnCero(){
        $this->setHora(0);
        $this->setMinutos(0);
        $this->setSegundos(0);
    }
    //incrementar segundos
    public function incrementar(){
        // $this->setSegundos();
        if($this->segundos >= 59){
            $this->setSegundos(0);
            
            $this->minutos++;
            if($this->segundos = 0){
                $this->minutos++;
            }
            
        }else{
            $this->segundos +=1;
        }
        if($this->minutos > 59 ){
            $this->setMinutos(0);
            
            $this->horas++;
         
        }
        if($this->horas > 23){
            $this->horas = 0;
            
        }
    }

    // public function agregarCero(){

    //     $horaString = "";
    //     $minutosString = "";
    //     $segundosString = "";

    //     if($this->getHoras() < 10){
    //        $horaString = $this->getHoras()."0";
    //        return $horaString;
    //     }
    //     if($this->getMinutos() < 10){
    //         $this->minutos = $this->getMinutos()."0";
    //         return $this->getMinutos();
    //     }
    //     if($this->getSegundos() < 10){
    //         $this->segundos = $this->getSegundos()."0";
    //         return $this->getMinutos();
    //     }
    // }
    //escribir en strings
    public function __toString(){
        return "La hora es: ".$this->getHoras().":".$this->getMinutos().":".$this->getSegundos().". "."\n";
    }
}

