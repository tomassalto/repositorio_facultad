<?php

if(!empty($_POST['lunes']) && !empty($_POST['martes']) && !empty($_POST['miercoles']) && !empty($_POST['jueves']) && !empty($_POST['viernes'])){
    $arrayHorarios = [];

    array_push($arrayHorarios,$_POST['lunes']);
    array_push($arrayHorarios,$_POST['martes']);
    array_push($arrayHorarios,$_POST['miercoles']);
    array_push($arrayHorarios,$_POST['jueves']);
    array_push($arrayHorarios,$_POST['viernes']);
    $cantHoras = 0;
    foreach($arrayHorarios as $key => $value){
        $cantHoras += $value;
        
    }
    echo "<p>La cantidad de horas de las materias son: $cantHoras</p>";
    // if(isset($_POST['lunes'])){
        

    // }if(isset($_POST['martes'])){
    //     array_push($arrayHorarios,$_POST['martes']);

    // }if(isset($_POST['miercoles'])){
    //     array_push($arrayHorarios,$_POST['miercoles']);

    // }if(isset($_POST['jueves'])){
    //     array_push($arrayHorarios,$_POST['jueves']);

    // }if(isset($_POST['viernes'])){
    //     array_push($arrayHorarios,$_POST['viernes']);
    // }
    
        
   
}else{
    echo "Hay elementos sin setear";
   
}

  




?>