<?php
class pepito{

    private function viajesString(){        
        $str = '';
        $coleccionViajes = $this->getColeccionViajes();
        foreach ($coleccionViajes as $key => $value) {
            $viajeString = $value->__toString();
            $str .= $viajeString;
        }
        return $str;
    }

     /*Un contrato se considera en estado moroso cuando su fecha de vencimiento ha sido superada,
     en caso de que pasen 10 días al vencimiento el estado cambiará de moroso a suspendido; 
     caso contrario el contrato se encuentra al día. */

     //VERIFICA LAS FECHAS DE HOY Y LA DEL VENCIMIENTO Y CAMBIA LOS ESTADOS

     public function actualizarEstadoContrato($contrato,$fechaHoy){
        $numero = $contrato->diasContratoVencido($contrato,$fechaHoy);
        if($numero < 10){
            $this->setEstado("MOROSO");
        }if ($numero > 10){
           $this->setEstado("SUSPENDIDO");
        } else {
           $this->setEstado("AL DIA");
        }
                

    }
    
     /*En la clase contrato implementar el método actualizarEstadoContrato: que actualiza el estado del
     contrato según corresponda según lo descripto. (Utilizar el método diasContratoVencido )*/

     public function diasContratoVencido($contrato,$fechaHoy){
        $vencimiento = $contrato->getFechaVencimiento();
        $fecha1 = new DateTime($fechaHoy);
        $fecha2 = new DateTime($vencimiento);
        $diferencias  = $fecha1->diff($fecha2);
        $dias = $diferencias->days;
        $numero = intval($dias);
        return $numero;
     }

        /* incorporarPlan: que incorpora a la colección de planes un nuevo plan siempre y cuando no haya un
    plan con los mismos canales y los mismos MG (en caso de que el plan incluyera). */

    public function incorporarPlan($plan){
        $sePuede = $this->verCanalesyMegas($plan);
        $arrayPlanes = $this->getColeccPlanes();
        if($sePuede == true){
            array_push($arrayPlanes,$plan);
            $this->setColeccPlanes($arrayPlanes);
        }  

    }

    public function registrarTorneo($colPartidos,$tipo,$array){
        $idTorneo=$array['ID'];
        $localidad=$array['LOCALIDAD'];
        $importePremio=$array['PREMIO'];
        if($tipo =='Nacional'){
        $objTorneo=new Nacional($idTorneo,$importePremio,$colPartidos,$localidad);
       }
        else if($tipo =='Provincial'){
            $provincia=$array['PROVINCIA'];
            $objTorneo=new Provincial($idTorneo,$importePremio,$colPartidos,$localidad,$provincia);
        $colTorneos=$this->getColTorneos();
        array_push($colTorneos,$objTorneo);
        $this->setColTorneos($colTorneos);
        return$objTorneo;
    }

}


?>