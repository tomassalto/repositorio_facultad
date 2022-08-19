<?php
if(isset($_POST)){
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
    }
    if(isset($_POST['apellido'])){
        $apellido = $_POST['apellido'];
    }
    if(isset($_POST['edad'])){
        $edad = $_POST['edad'];
        if($edad >= 18){
            $mayorONo = "mayor";
        }else{
            $mayorONo = "menor";
        }
    }
    if(isset($_POST['direccion'])){
        $direccion = $_POST['direccion'];
    }
    if(isset($_POST['estudios'])){
        $estudios = $_POST['estudios'];
        if($_POST['estudios'] == "1- No tiene estudios"){
            $stringEst = "No tiene estudios";
        }else if($_POST['estudios'] == "2- Estudios primarios"){
            $stringEst = "Estudios primarios";
        }else{
            $stringEst = "Estudios secundarios";
        }        
    }

    echo "<p>Hola yo soy $nombre, $apellido tengo $edad años, $mayorONo y vivo en $direccion, mis estudios son: $stringEst</p>";
}


?>
