<?php
include "Viaje.php";
include "Pasajero.php";
include "ResponsableV.php";

echo "Bienvenido!\n";
echo "Ingrese el codigo de viaje: \n";
$codigoViaje = trim(fgets(STDIN));
echo "Ingrese el destino: \n";
$destino = trim(fgets(STDIN));
echo "Ingrese la máxima cantidad de asientos: \n";
$cantidadAsientos = trim(fgets(STDIN));
echo "Ingrese los datos del responsable del viaje: \n";
echo "Numero de empleado: \n";
$numEmpleado = trim(fgets(STDIN));
echo "Numero de licencia: \n";
$numLicencia = trim(fgets(STDIN));
echo "Nombre: \n";
$nombre = trim(fgets(STDIN));
echo "Apellido: \n";
$apellido = trim(fgets(STDIN));

$objResposable = new ResponsableV($numEmpleado,$numLicencia,$nombre,$apellido);
$objetoViaje = new Viaje($codigoViaje,$destino,$cantidadAsientos, $objResposable);
$finalizar = true;

do{
    echo menu();
    $opcion = trim(fgets(STDIN));
    switch($opcion){

        case 1: 
            echo "El codigo de viaje es: {$objetoViaje->getCodigo()}.\n";
            echo "Ingrese el nuevo código: \n";
            $codigo = trim(fgets(STDIN));
            $objetoViaje->setCodigo($codigo);
            break;

        case 2: 
            echo "El destino del viaje es: {$objetoViaje->getDestino()}.\n";
            echo "Ingrese el nuevo destino: \n";
            $destino = trim(fgets(STDIN));
            $objetoViaje->setDestino($destino);
            break;
                
        case 3: 
            echo "La capacidad es {$objetoViaje->getPasajerosMax()} asientos.\n";
            echo "Ingrese la nueva cantidad: \n";
            $cantidad = trim(fgets(STDIN));
            $objetoViaje->setPasajerosMax($cantidad);
            break;

        case 4: 
            if($objetoViaje->consultarLugar()){
                echo "Ingrese los datos de un pasajero: \n";
                $objPasajero = obtenerDatos();
                if($objetoViaje->agregarPasajero($objPasajero)){
                    echo "El pasajero ha sido agregado!.\n";
                }else{
                    echo "El pasajero ya se encuentra en el viaje.\n";
                }
            }else{
                echo "No hay lugar disponible!";
            }
            break;

        case 5: 
            echo "Ingrese el dni del pasajero que quiere quitar: \n";
            $dni = intval(trim(fgets(STDIN)));
            if($objetoViaje->eliminarPasajero($dni)){
                echo "El pasajero ha sido eliminado del viaje .\n";
            }else{
                echo "No se encuentra el pasajero.\n";
            }
            break;

        case 6: 
            echo "Ingrese el dni del pasajero a modificar: \n";
            $dniPasajero = intval(trim(fgets(STDIN)));       
            if($objetoViaje->modificarDatosPasajero($dniPasajero)){
                echo "Se han modificado correctamente los datos!.\n";
            }else{
                echo "No se ha econtrado al pasajero para modificarlo.\n";
            }
            break;

        case 7: 
            echo $objetoViaje;
            break;

        
        
        case 8:
            $responsable = $objetoViaje->getResponsableViaje();
            echo $responsable;
            break;
    
        case 9:
            echo "Ingrese los nuevos datos del responsable: \n
            Número de empleado: ";
            $numEmpleado = trim(fgets(STDIN));
            echo "Número de licencia: \n";
            $numLicencia = trim(fgets(STDIN));
            echo "Nombre: \n";
            $nombre = trim(fgets(STDIN));
            echo "Apellido: \n";
            $apellido = trim(fgets(STDIN));
            $objResponsable = new ResponsableV($numEmpleado, $numLicencia, $nombre, $apellido);
            $objetoViaje->setResponsableViaje($objResponsable);
            break;

        default:
            $finalizar = false;
            break;

    }
}while($finalizar);

function menu(){


    return "Elija una opción:\n
    1. Modificar el código.\n
    2. Modificar el destino.\n
    3. Modificar la cantidad de asientos del viaje.\n
    4. Agregar Pasajero. \n
    5. Quitar Pasajero. \n
    6. Modificar Pasajero. \n
    7. Ver viaje. \n
    8. Ver datos del responsable. \n
    9. Modificar datos del responsable. \n
    10. Salir. \n";
}

function obtenerDatos(){

    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "DNI: \n";
    $dni = intval(trim(fgets(STDIN)));
    echo "Telefono: \n";
    $telefono = trim(fgets(STDIN));
    $objPasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
    return $objPasajero;
}
?>