<?php
class BaseDatos {
    private $HOSTNAME;
    private $BASEDATOS;
    private $USUARIO;
    private $CLAVE;
    private $CONEXION;
    private $QUERY;
    private $RESULT;
    private $ERROR;

    public function setHOSTNAME($HOSTNAME){
        $this->HOSTNAME = $HOSTNAME;
    }

    public function setBASEDATOS($BASEDATOS){
        $this->BASEDATOS = $BASEDATOS;
    }

    public function setUSUARIO($USUARIO){
        $this->USUARIO = $USUARIO;
    }

    public function setCLAVE($CLAVE){
        $this->CLAVE = $CLAVE;
    }

    public function setQUERY($QUERY){
        $this->QUERY = $QUERY;
    }

    public function setCONEXION($CONEXION){
        $this->CONEXION = $CONEXION;
    }

    public function setRESULT($RESULT){
        $this->RESULT = $RESULT;
    }

    public function setERROR($ERROR){
        $this->ERROR = $ERROR;
    }

    public function getHOSTNAME(){
        return $this->HOSTNAME;
    }

    public function getBASEDATOS(){
        return $this->BASEDATOS;
    }

    public function getUSUARIO(){
        return $this->USUARIO;
    }

    public function getCLAVE(){
        return $this->CLAVE;
    }

    public function getCONEXION(){
        return $this->CONEXION;
    }

    public function getQUERY(){
        return $this->QUERY;
    }

    public function getRESULT(){
        return $this->RESULT;
    }

    public function getERROR(){
        return "\n".$this->ERROR;
    }

    public function __construct(){
        $this->HOSTNAME = "127.0.0.1:3306";
        $this->BASEDATOS = "basedviajes";
        $this->USUARIO = "root";
        $this->CLAVE = "";
        $this->CONEXION = "";
        $this->QUERY = " ";
        $this->RESULT = 0;
        $this->ERROR = " ";
    }
    
    public function iniciar(){
        $verificacion = false;
        $conexion = mysqli_connect($this->getHOSTNAME(), $this->getUSUARIO(), $this->getCLAVE(), $this->getBASEDATOS());
        if($conexion){
            if(mysqli_select_db($conexion, $this->getBASEDATOS())){
                $this->setCONEXION($conexion);
                unset($this->QUERY);
                unset($this->ERROR);
                $verificacion = true;
            }else{
                $this->setERROR(mysqli_errno($conexion).":".mysqli_error($conexion));
            }
        }else{
            $this->setERROR(mysqli_errno($conexion).":".mysqli_error($conexion));
        }
        return $verificacion;
    }

    public function ejecutar($consulta){
        $verificacion = false;
        unset($this->ERROR);
        $this->setQUERY($consulta);
        $this->setRESULT(mysqli_query($this->getCONEXION(), $consulta));
        if($this->getRESULT()){
            $verificacion = true;
        }else{
            $this->setERROR(mysqli_errno($this->getCONEXION()).":".mysqli_error($this->getCONEXION()));
        }
        return $verificacion;
    }

    public function registro(){
        $verificacion = null;
        if($this->getRESULT()){
            unset($this->ERROR);
            if($temp = mysqli_fetch_assoc($this->getRESULT())){
                $verificacion = $temp;
            }else{
                mysqli_free_result($this->getRESULT());
            }
        }else{
            $this->setERROR(mysqli_errno($this->getCONEXION()).":".mysqli_error($this->getCONEXION()));
        }
        return $verificacion;
    }

    public function devuelveIDInsercion($consulta){
        $verificacion = null;
        unset($this->ERROR);
        if($this->setRESULT(mysqli_query($this->getCONEXION(), $consulta))){
            $id = mysqli_insert_id();
            $verificacion = $id;
        }else{
            $this->setERROR(mysqli_errno($this->getCONEXION()).":".mysqli_error($this->getCONEXION()));
        }
        return $verificacion;
    }
}
?>