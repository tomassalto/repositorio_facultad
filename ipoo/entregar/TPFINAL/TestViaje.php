<?php
require_once('Empresa.php');
require_once('ResponsableV.php');
require_once('Viaje.php');
require_once('Pasajero.php');
require_once('BD.php');

function menuModificar(){
$estado = true;       
    while($estado){
        echo "-------------------- 
¿Que quiere modificar?"."\n".
        "1. Un Viaje"."\n".
        "2. Un Pasajero"."\n".
        "3. Una Empresa"."\n".
        "4. Un Responsable"."\n".
        "0. Volver
--------------------"."\n";
        $rta = trim(fgets(STDIN));
        if(is_numeric($rta)){
            if($rta >= 0 && $rta <= 4){
                switch($rta){
                    case '1':
                        //modificar viaje
                        echo "Ingrese el número de viaje: \n";
                        $idViaje = intval(trim(fgets(STDIN)));
                        $objViaje = new Viaje();
                        if ($objViaje->buscar($idViaje)) {
                            echo $objViaje->__toString();
                            echo "Ingrese el destino: \n";
                            $vdestino = trim(fgets(STDIN));
                            if($vdestino != ''){
                                $objViaje->setVdestino($vdestino);
                            }
                            echo "Ingrese cantidad maxima de pasajeros: \n";
                            $vcantmaxpasajeros = intval(trim(fgets(STDIN)));
                            if($vcantmaxpasajeros != 0){
                                $objViaje->setVCantidadMax($vcantmaxpasajeros);
                            }
                            $quedar = true;
                            while ($quedar) {
                                echo "Ingrese el id de una empresa existente: \n";
                                $idEmpresa = intval(trim(fgets(STDIN)));
                                $objEmpresa = new Empresa();
                                if (!$objEmpresa->buscar($idEmpresa)) {
                                    echo "No existe dicha empresa.\n";
                                } else {
                                    $quedar = false;
                                }
                            }
                            $objViaje->setObjEmpresa($objEmpresa);
                            $quedar = true;
                            while ($quedar) {
                                echo "Ingrese el numero de un responsable existente: \n";
                                $rnumeroempleado = intval(trim(fgets(STDIN)));
                                $objResponsable = new ResponsableV();
                                if (!$objResponsable->buscar($rnumeroempleado)) {
                                    echo "No existe el empleado.\n";
                                } else {
                                    $quedar = false;
                                }
                            }
                            $objViaje->setObjResponsable($objResponsable);
                            echo "Ingrese el importe: \n";
                            $vimporte = trim(fgets(STDIN));
                            if($vimporte != 0){
                                $objViaje->setVimporte($vimporte);
                            }
                            echo "Ingrese el tipo de asiento: \n";
                            $tipoasiento = trim(fgets(STDIN));
                            if($tipoasiento != ''){
                                $objViaje->setTipoasiento($tipoasiento);
                            }
                            echo "Es ¿ida o vuelta?.\n";
                            $idaovuelta = trim(fgets(STDIN));
                            if($idaovuelta != ''){
                                $objViaje->setIdaVuelta($idaovuelta);
                            }
                            if($objViaje->modificar()){
                                echo "Se ha modificado correctamente el viaje.\n";
                            }else{
                               
                                echo  "--------------------\n".
                                "Ha fallado la modificacion del viaje.\n".
                                "--------------------";
                                echo $objViaje->getMensajeError();
                            }
                        } else {
                            echo "--------------------\n".
                            "No se encontró el viaje con ese ID viaje.\n"
                            ."--------------------";
                            echo $objViaje->getMensajeError();
                        }
                        break;

                    case '2':
                            //Modificar pasajero 
                            echo "Ingrese el documento de un pasajero: \n";
                            $dni = intval(trim(fgets(STDIN)));
                            $objPasajero = new Pasajero();
                            if ($objPasajero->buscar($dni)) {
                                echo $objPasajero->__toString();
                                echo "Ingrese el nombre: \n";
                                $nombrePas = trim(fgets(STDIN));
                                if ($nombrePas != '') {
                                    $objPasajero->setNombre($nombrePas);
                                }
                                echo "Ingrese el apellido: \n";
                                $apellidoPas = trim(fgets(STDIN));
                                if ($apellidoPas != '') {
                                    $objPasajero->setApellido($apellidoPas);
                                }
                                echo "Ingrese el telefono: \n";
                                $telefonoPas = intval(trim(fgets(STDIN)));
                                if ($telefonoPas != '') {
                                    $objPasajero->setTelefono($telefonoPas);
                                }
                                $quedar = true;
                                while ($quedar) {
                                    echo "Ingrese el id de un viaje existente: \n";
                                    $idViaje = intval(trim(fgets(STDIN)));
                                    $objViaje = new Viaje();
                                    if (!$objViaje->buscar($idViaje)) {
                                        echo "No existe dicho viaje.\n"
                                        ."--------------------";;
                                    } else {
                                        $quedar = false;
                                    }
                                }
                                if ($objPasajero->modificar()) {
                                    echo "Los datos se han modificado.\n"
                                    ."--------------------";
                                } else {
                                    echo "No se ha podido modificar.\n"
                                    ."--------------------";
                                }
                            } else {
                                echo "No se encontró el pasajero.\n"
                                ."--------------------";
                            }
                            break;

                        case '3':
                                //modificar empresa
                                echo "Ingrese el número de empresa: \n";
                                $idempresa = intval(trim(fgets(STDIN)));
                                $objEmpresa = new Empresa();
                                if ($objEmpresa->buscar($idempresa)) {
                                    echo $objEmpresa->__toString();
                                    echo "Ingrese el nombre: \n";
                                    $enombre = trim(fgets(STDIN));
                                    echo "Ingrese la dirección: \n";
                                    $edireccion = trim(fgets(STDIN));
                                    $objEmpresa->setNombre($enombre);
                                    $objEmpresa->setDireccion($edireccion);
                                    //if ($objEmpresa->cargarDatos($idempresa, $enombre, $edireccion)) {
                                        if ($objEmpresa->modificar()) {
                                            echo "Se ha modificado la empresa.\n"
                                            ."--------------------";
                                        } else {
                                            echo "No se ha modificado la empresa.\n"
                                            ."--------------------";
                                            echo $objEmpresa->getMensajeError();
                                        }
                                    /*} else {
                                        echo "No se han ingresado los datos.\n";
                                        echo $objEmpresa->getMensajeOp();
                                    }*/
                                } else {
                                    echo "No existe la empresa.\n"
                                    ."--------------------";
                                }
                                break;

                            case '4':
                                    //modificar responsable
                                    echo "Ingrese el número de empleado: \n";
                                    $rnumero = intval(trim(fgets(STDIN)));
                                    $objResponsable = new ResponsableV();
                                    if ($objResponsable->buscar($rnumero)) {
                                        echo $objResponsable->__toString();
                                        echo "Ingrese el número de licencia: \n";
                                        $rnumlicencia = intval(trim(fgets(STDIN)));
                                        if ($rnumlicencia != '') {
                                            $objResponsable->setNumLicencia($rnumlicencia);
                                        }
                                        echo "Ingrese el nombre: \n";
                                        $rnombre = trim(fgets(STDIN));
                                        if ($rnombre != '') {
                                            $objResponsable->setNombre($rnombre);
                                        }
                                        echo "Ingrese el apellido: \n";
                                        $rapellido = trim(fgets(STDIN));
                                        if ($rapellido != '') {
                                            $objResponsable->setApellido($rapellido);
                                        }
                                        if ($objResponsable->modificar()) {
                                            echo "Se han modificado los datos.\n"
                                            ."--------------------";
                                        } else {
                                            echo "No se han podido modificar los datos.\n"
                                            ."--------------------";
                                        }
                                    } else {
                                        echo "No se ha encontrado al responsable.\n"
                                        ."--------------------";
                                    }
                                    break;

                                    case '0':
                                        $estado = false;
                                        break;
                
                }
            }else{
               echo "Ingrese un numero correcto.\n"
               ."--------------------";
            }
        }else{
            echo "Ingrese un numero.\n"
            ."--------------------";
        }
        
    };
    return $estado;
   
}

function menuAgregar(){
    $estado = true;
    while($estado){
       echo "--------------------
¿Qué deséa agregar?\n".
        "1. Un Viaje"."\n".
        "2. Un Pasajero"."\n".
        "3. Una Empresa"."\n".
        "4. Un Responsable"."\n".
        "0. Volver
--------------------"."\n";
       $rta = trim(fgets(STDIN));
       if (is_numeric($rta)) {
           if ($rta >= 0 && $rta <= 4) {
               switch($rta){
                    case '1':
                        //crear viaje 
                        $quedarse = true;
                        while ($quedarse) {
                            echo "Ingrese el id del viaje: \n";
                            $idViaje = intval(trim(fgets(STDIN)));
                            $objViaje = new Viaje();
                            if($objViaje->buscar($idViaje)){
                                echo "El id de viaje ya esta utilizado.\n"
                                ."--------------------";
                            }else{
                                $objViaje->setIdviaje($idViaje);
                                $quedarse = false;
                            }
                            echo "Ingrese el destino: \n";
                            $vdestino = trim(fgets(STDIN));
                            $objViaje->setVdestino($vdestino);
                            echo "Ingrese la cantidad máxima de pasajeros: \n";
                            $vcantmaxpasajeros = intval(trim(fgets(STDIN)));
                            $objViaje->setVCantidadMax($vcantmaxpasajeros);
                            $quedarse = true;
                            while ($quedarse) {
                                echo "Ingrese el id de una empresa existente: \n";
                                $idEmpresa = intval(trim(fgets(STDIN)));
                                $objEmpresa = new Empresa();
                                if($objEmpresa->buscar($idEmpresa)){
                                    $quedarse = false;
                                    $objViaje->setObjEmpresa($objEmpresa);
                                   
                                }else{
                                    echo "Dicho id de empresa no existe.\n"
                                    ."--------------------";
                                }
                            }
                            $quedarse = true;
                            while ($quedarse) {
                                echo "Ingrese el número de un responsable.\n";
                                $rnumeroempleado = intval(trim(fgets(STDIN)));
                                $objResponsable = new ResponsableV();
                                if(!$objResponsable->buscar($rnumeroempleado)){
                                    echo "Dicho responsable no existe.\n"
                                    ."--------------------";
                                }else{
                                    $quedarse = false;
                                    $objViaje->setObjResponsable($objResponsable);
                                }
                            }
                            echo "Ingrese el importe: \n";
                            $vimporte = trim(fgets(STDIN));
                            $objViaje->setVimporte($vimporte);
                            echo "Ingrese el tipo de asiento: \n";
                            $tipoasiento = trim(fgets(STDIN));
                            $objViaje->setTipoasiento($tipoasiento);
                            echo "Es ¿ida o vuelta?.\n";
                            $idaovuelta = trim(fgets(STDIN));
                            $objViaje->setIdaVuelta($idaovuelta);
                            echo $objViaje->__toString();
                            if($objViaje->insertar()){
                                echo "El viaje se ha insertado.\n"
                                ."--------------------";
                            }else{
                                echo "El viaje no se ha insertado.\n"
                                ."--------------------";
                                echo $objViaje->getMensajeError();
                            };
                        };
                        break;

                    case '2':
                            //cargar un pasajero
                            echo "Ingrese el dni: \n";
                            $dni = intval(trim(fgets(STDIN)));
                            $objPasajero = new Pasajero();
                            if ($objPasajero->buscar($dni)) {
                                echo "Ese pasajero ya existe.\n";
                            } else {
                                $objPasajero->setDocumento($dni);
                                echo "Ingrese el nombre: \n";
                                $nombrePas = trim(fgets(STDIN));
                                $objPasajero->setNombre($nombrePas);
                                echo "Ingrese el apellido: \n";
                                $apellidoPas = trim(fgets(STDIN));
                                $objPasajero->setApellido($apellidoPas);
                                echo "Ingrese el telefono: \n";
                                $telefonoPas = intval(trim(fgets(STDIN)));
                                $objPasajero->setTelefono($telefonoPas);
                                $quedar = true;
                                while($quedar){
                                    echo "Ingrese el número de viaje existente: \n";
                                    $idViaje = intval(trim(fgets(STDIN)));
                                    $objViaje = new Viaje();
                                    if($objViaje->buscar($idViaje)){
                                        $objPasajero->setObjViaje($objViaje);
                                        $quedar = false;
                                    }else{
                                        echo "Dicho viaje no existe.\n"
                                        ."--------------------";
                                    }
                                }
                                if ($objPasajero->insertar()) {
                                    echo "Se ha ingresado al pasajero.\n"
                                    ."--------------------";
                                } else {
                                    echo "No se ha podido ingresar al pasajero.\n"
                                    ."--------------------";
                                    echo $objPasajero->getMensajeError();
                                }
                                
                            }
                            break;

                    case '3':
                            //cargar empresa
                            $quedar = true;
                            while ($quedar) {
                                echo "Ingrese el id de la empresa: \n";
                                $idEmpresa = intval(trim(fgets(STDIN)));
                                $objEmpresa = new Empresa();
                                if($objEmpresa->buscar($idEmpresa)){
                                    echo "El id ya esta utilizado.\n"
                                    ."--------------------";
                                }else{
                                    $quedar = false;
                                    $objEmpresa->setIdentificacion($idEmpresa);
                                }
                            }
                            echo "Ingrese el nombre de la empresa: \n";
                            $enombre = trim(fgets(STDIN));
                            $objEmpresa->setNombre($enombre);
                            echo "Ingrese la dirección de la empresa: \n";
                            $edireccion = trim(fgets(STDIN));
                            $objEmpresa->setDireccion($edireccion);
                            if($objEmpresa->insertar()){
                                echo "La empresa se ha insertado.\n"
                                ."--------------------";
                            }else{
                                echo "La empresa no se ha podido insertar.\n"
                                ."--------------------";
                                echo $objEmpresa->getMensajeError();
                            }                    
                        break;

                    case '4':
                            //crear responsable 
                            echo "Ingrese el número de empleado: \n";
                            $rnumero = intval(trim(fgets(STDIN)));
                            $objResponsable = new ResponsableV();
                            if ($objResponsable->buscar($rnumero)) {
                                echo "Ese numero de empleado ya existe.\n"
                                ."--------------------";
                            } else {
                                $objResponsable->setNumEmpleado($rnumero);
                                echo "Ingrese el número de licencia: \n";
                                $rnumlicencia = intval(trim(fgets(STDIN)));
                                $objResponsable->setNumLicencia($rnumlicencia);
                                echo "Ingrese el nombre: \n";
                                $rnombre = trim(fgets(STDIN));
                                $objResponsable->setNombre($rnombre);
                                echo "Ingrese el apellido: \n";
                                $rapellido = trim(fgets(STDIN));
                                $objResponsable->setApellido($rapellido);
                                if ($objResponsable->insertar()) {
                                    echo "El responsable ha sido cargado.\n"
                                    ."--------------------";
                                } else {
                                    echo "El responsable no ha sido cargado.\n"
                                    ."--------------------";
                                    echo $objResponsable->getMensajeError();
                                }
                            }
                            break;           

                       case '0':
                        $estado = false;
                        break;
                }
           } 
           else{
                echo "Ingrese un numero correcto.\n"
                ."--------------------";
         }
        }else{
            echo "Ingrese un numero.\n"
            ."--------------------";
     }
   } 
}



function menuEliminar(){
 $estado = true;
    while($estado){
    echo "--------------------
¿Qué deséa Eliminar?\n".
        "1. Un Viaje"."\n".
        "2. Un Pasajero"."\n".
        "3. Una Empresa"."\n".
        "4. Un Responsable"."\n".
        "0. Volver
--------------------"."\n";
       $rta = trim(fgets(STDIN));
       if (is_numeric($rta)) {
           if ($rta >= 0 && $rta <= 4) {
            switch($rta){
                case '1':
                    //eliminar viaje
                    echo "Recuerde que para eliminar un viaje no debe haber pasajeros añadidos en el mismo.\n";
                    echo "Ingrese el número de viaje: \n";
                    $idViaje = intval(trim(fgets(STDIN)));
                    $objViaje = new Viaje();
                    if ($objViaje->buscar($idViaje)) {
                        if($objViaje->eliminar()){
                            echo "El viaje se ha eliminado correctamente.\n"
                            ."--------------------";
                        }else{
                            echo "El viaje no ha podido eliminarse.\n"
                            ."--------------------";
                            echo $objViaje->getMensajeError();
                        }
                    } else {
                        echo "No se encontró dicho viaje.\n"
                        ."--------------------";
                    }
                    break;

                case '2':
                        //eliminar pasajero 
                        echo "Ingrese el documento de un pasajero: \n";
                        $dni = intval(trim(fgets(STDIN)));
                        $objPasajero = new Pasajero();
                        if ($objPasajero->buscar($dni)) {
                            if ($objPasajero->eliminar()) {
                                echo "El pasajero ha sido eliminado.\n"
                                ."--------------------";
                            } else {
                                echo "El pasajero no se ha podido eliminar.\n"
                                ."--------------------";
                            }
                        } else {
                            echo "No se encontró el pasajero.\n"
                            ."--------------------";
                        }
                        break;

                case '3':
                        //eliminar empresa
                        echo "Ingrese el número de empresa: \n";
                        $idempresa = intval(trim(fgets(STDIN)));
                        $objEmpresa = new Empresa();
                        if ($objEmpresa->buscar($idempresa)) {
                            if($objEmpresa->eliminar()){
                                echo "La empresa se ha eliminado.\n"
                                ."--------------------";
                            }else{
                                echo "La empresa no se ha podido eliminar.\n"
                                ."--------------------";
                                echo $objEmpresa->getMensajeError();
                            }
                        } else {
                            echo "No existe la empresa.\n"
                            ."--------------------";
                        }
                        break;

                        
                case '4':
                    //eliminar responsable
                    echo "Ingrese el número de empleado: \n";
                    $rnumero = intval(trim(fgets(STDIN)));
                    $objResponsable = new ResponsableV();
                    if ($objResponsable->buscar($rnumero)) {
                        if ($objResponsable->eliminar()) {
                            echo "Se ha eliminado al responsable.\n"
                            ."--------------------";
                        } else {
                            echo "No se ha podido eliminar.\n"
                            ."--------------------";
                            echo $objResponsable->getMensajeError();
                        }
                    } else {
                        echo "No se ha encontrado al responsable.\n"
                        ."--------------------";
                    }
                    break;

                case '0':
                    $estado = false;
                    break;     
    
            }
           }else{
             echo "Ingrese un numero correcto.\n"
             ."--------------------";
         }
        }else{
            echo "Ingrese un numero.\n"
            ."--------------------";
     }
    }       
}

function menuMostrar(){
$estado = true;
while($estado){
echo "--------------------
¿Qué deséa Mostrar?\n".
    "1. Un Viaje"."\n".
    "2. Un Pasajero"."\n".
    "3. Una Empresa"."\n".
    "4. Un Responsable"."\n".
    "0. Volver
--------------------    "."\n";
       $rta = trim(fgets(STDIN));
       if(is_numeric($rta)){
           if($rta >= 0 && $rta <= 4) {
                switch($rta){

                    case '1':
                        $objViaje = new Viaje();
                        $listaViaje = $objViaje->listar("");
                        if(count($listaViaje) == 0){
                            echo "No hay viajes cargados.\n"
                            ."--------------------";
                        }else{
                            $lista = "";
                            for($i = 0; $i < count($listaViaje); $i++){
                                $lista .= ($i + 1) . "." . $listaViaje[$i]. "\n ------------------------ \n";
                            }
                            echo $lista;
                        }
                        break;

                    case '2':
                        $objPasajero = new Pasajero();
                        $listaPasajeros = $objPasajero->listar("");
                        if(count($listaPasajeros) == 0){
                            echo "No hay pasajeros cargados\n"
                            ."--------------------";
                        }else{
                            $lista = "";
                            for($i = 0; $i < count($listaPasajeros); $i++){
                                $lista .= ($i + 1) . "." . $listaPasajeros[$i]. "\n ---------------------- \n";
                            }
                            echo $lista;
                        }
                        break;    

                    case '3':
                        //ver empresas
                        $objEmpresa = new Empresa();
                        $listaEmpresa = $objEmpresa->listar("");                        
                        if (count($listaEmpresa) == 0){
                            echo "No hay empresas cargadas.\n"
                            ."--------------------";
                        } else {
                            //print_r($arregloEmpresas);
                            $lista = "";
                            for($i = 0; $i < count($listaEmpresa); $i++) {
                                $lista .= ($i + 1) . ".". $listaEmpresa[$i]. "\n ------------------- \n";                                
                            }
                            echo $lista;
                        }
                        break;

                    case '4':
                        $objResponsable = new ResponsableV();
                        $listaResposable = $objResponsable->listar("");
                        if(count($listaResposable) == 0){
                            echo "No hay resposables cargados\n"
                            ."--------------------";
                        }else{
                            $lista = "";
                            for($i = 0; $i < count($listaResposable); $i++){
                                $lista .= ($i + 1).".". $listaResposable[$i]. "\n -------------------- \n";
                            }
                            echo $lista;
                        }
                        break;

                    case '0':
                        $estado = false;
                        break;
                }
           }else{
                echo "Ingrese un numero correcto.\n"
                ."--------------------";
            }
         }else{
            echo "Ingrese un numero.\n"
            ."--------------------";
        }
    }      
}

function menu(){

    echo "-------------------- 
Hola. ¿Que desea realizar?"."\n".
    "1. Modificar"."\n".
    "2. Eliminar"."\n".
    "3. Agregar"."\n".
    "4. Mostrar"."\n".
    "0. Salir
-------------------- "."\n";    
}

//
//programa principal
//

$programaPrincipal = true;
while($programaPrincipal){
    menu();
    $opcionSeleccionada = intval(trim(fgets(STDIN)));
    switch($opcionSeleccionada){

        case '1':
           menuModificar();
           break;

        case '2':
            menuEliminar();
            break;

        case '3':
            menuAgregar();
            break;

        case '4':
            menuMostrar();
            break;    

        case '0':
            $programaPrincipal = false;
            break;    
    }
}





?>