<?php
include_once('Cuenta.php');
class Banco{
    private $coleccionCuentaCorriente = [];
    private $coleccionCajaAhorro = [];
    private $ultimoValorCuentaAsignado;
    private $coleccionCliente = [];
    private $objPersona;

    public function __construct($colecCuentaCorr,$ultimoValor){
        $this->coleccionCuentaCorriente = $colecCuentaCorr;
        // $this->coleccionCajaAhorro = $colecCajaAhorro;
        $this->ultimoValorCuentaAsignado = $ultimoValor;
        // $this->coleccionCliente = $coleccionCliente;
        $this->objPersona;
       
    }

    public function getColeccionCuentaCorriente(){
        return $this->coleccionCuentaCorriente;
    }
    public function setColeccionCuentaCorriente($coleccionCuentaCorriente){
        $this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
    }
    public function getColeccionCajaAhorro(){
        return $this->coleccionCajaAhorro;
    }
    public function setColeccionCajaAhorro($coleccionCajaAhorro){
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
    }
    public function getUltimoValorCuentaAsignado(){
        return $this->ultimoValorCuentaAsignado;
    }
    public function setUltimoValorCuentaAsignado($ultimoValorCuentaAsignado){
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
    }
    public function getColeccionCliente(){
        return $this->coleccionCliente;
    }
    public function setColeccionCliente($coleccionCliente){
        $this->coleccionCliente = $coleccionCliente;
    }
    public function getObjPersona(){
        return $this->objPersona;
    }
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;
    }

    private function clienteString(){
        $str = '';
        $coleccionCliente = $this->getColeccionCliente();
        foreach ($coleccionCliente as $key => $value) {
            $clienteString = $value->__toString();
            $str .= $clienteString;
        }
        return $str;
    }

    public function incorporarCliente($objCliente){
        $arrayClientes = $this->getColeccionCliente();
        array_push($arrayClientes,$objCliente);
        $this->setColeccionCliente($arrayClientes);
    }

    public function incorporarCuentaCorriente($numeroCliente,$giro){
        $arrayClientes = $this->getColeccionCliente();        
        $estado = true;
        $i = 0;    
        while($estado && $i <= count($arrayClientes)){
            $clienteSeleccionado = $arrayClientes[$i];
            $nroClienteSeleccionado = $clienteSeleccionado->getNroCliente();            
            if($nroClienteSeleccionado == $numeroCliente){
                $arrayCuentaCorr = $this->getColeccionCuentaCorriente();
                $nuevaCuenta = new CuentaCorriente($clienteSeleccionado,$giro);
                array_push($arrayCuentaCorr,$nuevaCuenta);
                $this->setColeccionCuentaCorriente($arrayCuentaCorr);
                $estado = false;
            }
            $i++;
        }
        return $estado;
    }

    public function incorporarCajaAhorro($numeroCliente){
        $arrayClientes = $this->getColeccionCliente();
        $i = 0;
        $estado = true;
        while($estado && $i <= count($arrayClientes)){
            $clienteSeleccionado = $arrayClientes[$i];
            $nroCliente = $clienteSeleccionado->getNroCliente();
            if($nroCliente == $numeroCliente){
                $arrayCajaAhorro = $this->getColeccionCajaAhorro();
                $cajaAhorro = new CajaAhorro($clienteSeleccionado);
                array_push($arrayCajaAhorro,$cajaAhorro);
                $this->setColeccionCajaAhorro($arrayCajaAhorro);
                $estado = false;
            }
            $i++;
        }
        return $estado;
    }

    // public function realizarDeposito($numCuenta,$cash){
    //     $arrayCA = $this->getColeccionCajaAhorro();
    //     $arrayCC = $this->getColeccionCuentaCorriente();
    //     $array = array_merge()
    // }

    public function realizarRetiro(){

    }

    public function __toString(){
        $cliente = $this->clienteString();
        return "Clientes: $cliente";
    }
   
}