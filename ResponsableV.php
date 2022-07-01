<?php
class ResponsableV{
    private $nombre;
    private $apellido;
    private $numEmpleado;
    private $numLicencia;
    private $mensajeError;

    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }

    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setMensajeError($mensajeError){
        $this->mensajeError = $mensajeError;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
 
    public function getNumLicencia(){
        return $this->numLicencia;
    }

    public function getMensajeError(){
        return $this->mensajeError;
    }

	public function __construct()
	{
        $this->nombre = "";
        $this->apellido = "";
		$this->numLicencia = "";
		$this->numEmpleado = "";
	}

    public function cargar($nombre, $apellido, $numLicencia, $numEmpleado){		
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setNumLicencia($numLicencia);
        $this->setNumEmpleado($numEmpleado);
    }

    /**
     * Este modulo agrega un pasajero de la BD.
    */
    public function insertar(){
        $baseDatos = new BaseDatos();
        $resp = null;
        $consulta = "INSERT INTO responsable (rnumerolicencia, rnombre, rapellido) 
                    VALUES (".$this->getNumLicencia().",'".$this->getNombre()."','".$this->getApellido()."')";
        if($baseDatos->iniciar()){
            if($baseDatos->ejecutar($consulta)){
                $resp = true;
            }else{
                $resp = false;
                $this->setMensajeError($baseDatos->getERROR());
            }
        }else{
            $resp = false;
            $this->setMensajeError($baseDatos->getERROR());
        }
        return $resp;
    }

    /**
     * Este modulo modifica un pasajero de la BD.
    */
    public function modificar(){
        $baseDatos = new BaseDatos();
        $resp = null;
        $consulta = "UPDATE responsable 
                    SET rnumerolicencia = ".$this->getNumLicencia().", 
                    rnombre = '".$this->getNombre()."', 
                    rapellido ='".$this->getApellido()."' WHERE rnumeroempleado = ".$this->getNumEmpleado();
        if($baseDatos->iniciar()){
            if($baseDatos->ejecutar($consulta)){
                $resp = true;
            }else{
                $resp = false;
                $this->setMensajeError($baseDatos->getERROR());
            }
        }else{
            $resp = false;
            $this->setMensajeError($baseDatos->getERROR());
        }
        return $resp;
    }

    /**
     * Este modulo modifica un pasajero de la BD.
    */
    public function eliminar(){
        $baseDatos = new BaseDatos();
        $resp = null;
        $consulta = "DELETE FROM responsable WHERE rnumeroempleado = ".$this->getNumEmpleado();
        if($baseDatos->iniciar()){
            if($baseDatos->ejecutar($consulta)){
                $resp = true;
            }else{
                $resp = false;
            $this->setMensajeError($baseDatos->getERROR());
            }
        }else{
            $resp = false;
            $this->setMensajeError($baseDatos->getERROR());
        }
        return $resp;
    }

    public function buscar($nroEmpleado){
        $baseDatos = new BaseDatos();
		$consulta="SELECT * FROM responsable WHERE rnumeroempleado = ".$nroEmpleado;
		$resp = null;
		if($baseDatos->iniciar()){
			if($baseDatos->ejecutar($consulta)){
				if($responsable=$baseDatos->registro()){					
				    $this->setNombre($responsable['rnombre']);
					$this->setApellido($responsable['rapellido']);
					$this->setNumLicencia($responsable['rnumerolicencia']);
					$this->setNumEmpleado($nroEmpleado);
					$resp= true;
				}
		 	}else{
                $resp = false;
                $this->setMensajeError($baseDatos->getERROR());
			}
		 }else{
            $resp = false;
            $this->setMensajeError($baseDatos->getERROR());
		 }		
		 return $resp;
	}

    public function listar($condicion = ''){
	    $resp = null;
        $baseDatos = new BaseDatos();
		$consultaResponsable="SELECT * FROM responsable ";
		if($condicion != ""){
		    $consultaResponsable .=' where '.$condicion;
		}
		if($baseDatos->iniciar()){
			if($baseDatos->ejecutar($consultaResponsable)){
                $resp = [];		
				while($responsable=$baseDatos->registro()){		
                    $objResponsable = new ResponsableV();
                    $objResponsable->buscar($responsable['rnumeroempleado']);
                    array_push($resp, $objResponsable);
				}
		 	}else{
                $resp = false;
                $this->setMensajeError($baseDatos->getERROR());
			}
		 }else{
            $resp = false;
            $this->setMensajeError($baseDatos->getERROR());
		 }		
		 return $resp;
	}

	public function __toString()
	{
		return ("El nombre del responsable del viaje es: ".$this->getNombre()."\n".
				"El apellido del responsable del viaje es: ".$this->getApellido()."\n".
				"El numero de empleado es: ".$this->getNumEmpleado()."\n".
				"El numero de licencia es: ".$this->getNumLicencia()."\n");
	}



}
?>