<?php
include "Viaje.php";

echo "Bienvenido!\n";
echo "Ingrese el codigo de viaje: \n";
$codigoViaje = trim(fgets(STDIN));
echo "Ingrese el destino: \n";
$destino = trim(fgets(STDIN));
echo "Ingrese la máxima cantidad de asientos: \n";
$cantidadAsientos = trim(fgets(STDIN));


$objetoViaje = new Viaje($codigoViaje,$destino,$cantidadAsientos);
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
                $pasajero = obtenerDatos();
                if($objetoViaje->agregarPasajero($pasajero)){
                    echo "El pasajero ha sido agregado!.\n";
                }else{
                    echo "El pasajero ya se encuentra en el viaje.\n";
                }
            }else{
                echo "No hay lugar disponible!";
            }
            break;

        case 5: 
            echo "Ingrese los datos del pasajero que quiere quitar: \n";
            $pasajero = obtenerDatos();
            if($objetoViaje->eliminarPasajero($pasajero)){
                echo "El pasajero ha sido eliminado del viaje .\n";
            }else{
                echo "No se encuentra el pasajero.\n";
            }
            break;

        case 6: 
            echo "Ingrese los datos del pasajero a modificar: \n";
            $pasajero = obtenerDatos();
            echo "Ingrese los nuevos datos: \n";
            $pasajero2 = obtenerDatos();
            if($objetoViaje->modificarDatosPasajero($pasajero, $pasajero2)){
                echo "Se han modificado correctamente los datos!.\n";
            }else{
                echo "No se ha econtrado al pasajero para modificarlo.\n";
            }
            break;

        case 7: 
            echo $objetoViaje;
            break;

        default:
            $finalizar = false;
            break;    
    }
}while($finalizar);

function menu(){


    return $menu = "Elija una opción:\n
    1. Modificar el código.\n
    2. Modificar el destino.\n
    3. Modificar la cantidad de asientos del viaje.\n
    4. Agregar Pasajero. \n
    5. Quitar Pasajero. \n
    6. Modificar Pasajero. \n
    7. Ver viaje. \n
    8. Salir. \n";
}

function obtenerDatos(){

    echo "Nombre: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido: \n";
    $apellido = trim(fgets(STDIN));
    echo "DNI: \n";
    $dni = intval(trim(fgets(STDIN)));
    $pasajero = ['nombre'=>$nombre, 'apellido'=>$apellido, 'DNI'=>$dni];
    return $pasajero;
}
?>