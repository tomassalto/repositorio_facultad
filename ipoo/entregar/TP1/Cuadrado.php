<?php
class Cuadrado{


    //Atributos
    private $arrayPuntos = ['PuntoA' => [], 
                            'PuntoB' => [],
                            'PuntoC' => [],
                            'PuntoD' => []];

    //Constructo
    public function __construct($puntoA, $puntoB, $puntoC, $puntoD){
        $this->arrayPuntos = ['PuntoA' => $puntoA, 'PuntoB' => $puntoB, 'PuntoC' => $puntoC, 'PuntoD' => $puntoD];
    }


    //getters y setters 
    public function getPuntoA(){
        return $this->arrayPuntos['PuntoA'];
    }

    public function getPuntoB(){
        return $this->arrayPuntos['PuntoB'];
    }

    public function getPuntoC(){
        return $this->arrayPuntos['PuntoC'];
    }

    public function getPuntoD(){
        return $this->arrayPuntos['PuntoD'];
    }

    public function setPuntoA($valorA){
        $this->arrayPuntos['PuntoA'] = $valorA;
    }

    public function setPuntoB($valorB){
        $this->arrayPuntos['PuntoB'] = $valorB;
    }

    public function setPuntoC($valorC){
        $this->arrayPuntos['PuntoC'] = $valorC;
    }

    public function setPuntoD($valorD){
        $this->arrayPuntos['PuntoD'] = $valorD;
    }

    
    public function area(){
        $ladoAB = abs($this->arrayPuntos['PuntoB'][0] - $this->arrayPuntos['PuntoA'][0]);
        $ladoAC = abs($this->arrayPuntos['PuntoA'][1] - $this->arrayPuntos['PuntoC'][1]);
        return $ladoAB * $ladoAC;
    }

    public function desplazar($d){
        //Calculo de lados
        $ladoCALateral = abs($this->arrayPuntos['PuntoA'][1] - $this->arrayPuntos['PuntoC'][1]);
        $ladoCDBase = abs($this->arrayPuntos['PuntoC'][0] - $this->arrayPuntos['PuntoD'][0]);
      
        $this->arrayPuntos['PuntoC'][0] = $d[0];
        $this->arrayPuntos['PuntoC'][1] = $d[1];
        
        $this->arrayPuntos['PuntoA'][0] = $this->arrayPuntos['PuntoC'][0];
        $this->arrayPuntos['PuntoA'][1] = abs($this->arrayPuntos['PuntoC'][1] + $ladoCALateral);
     
        $this->arrayPuntos['PuntoB'][0] = $this->arrayPuntos['PuntoC'][0] + $ladoCDBase;
        $this->arrayPuntos['PuntoB'][1] = $this->arrayPuntos['PuntoC'][1] + $ladoCALateral;
       
        $this->arrayPuntos['PuntoD'][0] = $this->arrayPuntos['PuntoC'][0] + $ladoCDBase;
        $this->arrayPuntos['PuntoD'][1] = $this->arrayPuntos['PuntoC'][1];
    }

     
    public function aumentarTam($t){
       
        $this->arrayPuntos['PuntoA'][1] += $t;
    
        $this->arrayPuntos['PuntoB'][0] += $t;
        $this->arrayPuntos['PuntoB'][1] += $t;
      
        $this->arrayPuntos['PuntoD'][0] += $t;
    }

    /**Metodo toString */
    public function __toString(){
        $puntos = '';
        $puntoA = [$this->arrayPuntos['PuntoA'][0], $this->arrayPuntos['PuntoA'][1]];
        $puntos .= "Punto A ($puntoA[0]/$puntoA[1]).\n";
        $puntoB = [$this->arrayPuntos['PuntoB'][0], $this->arrayPuntos['PuntoB'][1]];
        $puntos .= "Punto B ($puntoB[0]/$puntoB[1]).\n";
        $puntoC = [$this->arrayPuntos['PuntoC'][0], $this->arrayPuntos['PuntoC'][1]];
        $puntos .= "Punto C ($puntoC[0]/$puntoC[1]).\n";
        $puntoD = [$this->arrayPuntos['PuntoD'][0], $this->arrayPuntos['PuntoD'][1]];
        $puntos .= "Punto D ($puntoD[0]/$puntoD[1]).\n";
        return $puntos;
    }
}   