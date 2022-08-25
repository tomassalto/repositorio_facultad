<?php
$precio = 0;
if(isset($_POST)){
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
    }
    if(isset($_POST['apellido'])){
        $apellido = $_POST['apellido'];
    }
    if(isset($_POST['edad'])){
        if($_POST['edad'] < 12){
            $precio = 160;
        }
        elseif($_POST['edad'] >= 12 && $_POST['estudiante'] == "si"){
            $precio = 180;
        }else{
            $precio = 300;
        }

    }
    echo "El precio es: $precio";
}


?>