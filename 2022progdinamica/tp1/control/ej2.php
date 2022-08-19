<?php

if($_GET){
    $arrayHorarios = [];
    if(isset($_GET['lunes'])){
        array_push($arrayHorarios,$_GET['lunes']);

    }if(isset($_GET['martes'])){
        array_push($arrayHorarios,$_GET['martes']);

    }if(isset($_GET['miercoles'])){
        array_push($arrayHorarios,$_GET['miercoles']);

    }if(isset($_GET['jueves'])){
        array_push($arrayHorarios,$_GET['jueves']);

    }if(isset($_GET['viernes'])){
        array_push($arrayHorarios,$_GET['viernes']);
    }
}
    $cantHoras = 0;
    foreach($arrayHorarios as $key => $value){
        $cantHoras += $value;
        
    }
    echo "<p>La cantidad de horas de las materias son: $cantHoras</p>";




?>