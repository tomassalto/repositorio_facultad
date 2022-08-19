<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
/*
  Crear un programa en php en el que generen un array bidimensional asociativo
que contenga los para cada día de la semana la materia que cursan junto con la carga horaria
de la misma. Luego recorrer el array usando una estructura foreach que muestre por pantalla la
información contenida
 */

 $arrayDatos = array(
    'Arquitectura y seguridad' => array(
        'dias' => "Lunes y Miercoles",
        'horarios' => "16:00 a 20:00"        
    ),
    'Diseño grafico' => array(
        'dias' => "Martes",
        'horarios' => '16:00 a 20:00'
    ),
    'Programacion web dinamica' => array(
        'dias' => "Jueves y Viernes",
        'horarios' => "Jueves de 15:30 a 18:00", "Viernes de 15:30 a 20:00"
    )
    );

 foreach($arrayDatos as $value => $detalles){
    echo "<h1>$value</h1>" ; 
    foreach($detalles as $indice){
        echo "<p>$indice</p>";
    }
 }
 
?>

</body>
</html>