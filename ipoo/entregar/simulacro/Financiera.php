<?php
class Financiera{
    private $denominacion;
    private $direccion;
    private $coleccionPrestamos = [];

    public function __construct($denominacion,$direccion){
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;       
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;      
    }

    public function getColeccionPrestamos(){
        return $this->coleccionPrestamos;
    }
    public function setColeccionPrestamos($coleccionPrestamos){
        $this->coleccionPrestamos = $coleccionPrestamos;       
    }
    /**Metodo para mostrar los préstamos
     * @param void
     * @return string
     */
    private function prestamosString(){
        $str = '';
        $coleccionPrestamos = $this->getColeccionPrestamos();
        foreach ($coleccionPrestamos as $key => $value) {
            $prestamoString = $value->__toString();
            $str .= $prestamoString;
        }
        return $str;
    }
    //toString
    public function __toString()
    {
        $prestamos = $this->prestamosString();
        $str = "Datos de la financiera: \n
        Denominacion: {$this->getDenominacion()}. Direccion: {$this->getDireccion()}.\n
        Prestamos: $prestamos.
        ";
        return $str;
    }

     /**Metodo para incorporar un préstamo
     * @param objeto $objPrestamo
     * @return void
     */
    public function incorporarPrestamo($prestamo){
        $arrayPrestamos = $this->getColeccionPrestamos();
        array_push($arrayPrestamos,$prestamo);
        $this->setColeccionPrestamos($arrayPrestamos);
    }
    
     /**Metodo para agregar préstamos si califica según una cuenta matemática
     * @param void
     * @return void
     */
    public function otorgarPrestamoSiCalifica(){
        $arrayPrestamos = $this->getColeccionPrestamos();      
        foreach ($arrayPrestamos as $key => $value) {
            $prestamo = $value;
            $estadoPrestamo = $prestamo->getFechaOtorgamiento();
            if($estadoPrestamo == 'No aprobado.'){
                $monto = $prestamo->getMonto();
                $cantCuotas = $prestamo->getCantidadCuotas();
                $montoCuota = $monto / $cantCuotas;
                $ObjPersona = $prestamo->getObjPersona();
                $montoNeto = $ObjPersona->getNeto();
                $montoNetoCuarenta = $montoNeto * 0.4;
                if($montoCuota <= $montoNetoCuarenta){
                    $prestamo->otorgarPrestamo();
                } 
            }
        }
    }

    /**Metodo para saber la cuota a pagar de un cierto préstamo
     *  @param $idPrestamo
     * @return object
     */
    public function informarCuotaPagar($idPrestamo){
        $arrayPrestamos = $this->getColeccionPrestamos();
        foreach($arrayPrestamos as $key => $value){
            $objPrestamo = $value;
            $identificador = $objPrestamo->getIdentificacion();
            if($identificador == $idPrestamo){
              $cuotaAPagar = $objPrestamo->darSiguienteCuotaPagar();
              return $cuotaAPagar;
            }
        }
    }
}