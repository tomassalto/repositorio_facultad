<?php
$dir = '../archivos/';
$nombre = $_FILES['archivo']["name"];

    if($_FILES['archivo']["error"] <= 0){
        if($_FILES['archivo']['type'] == "text/plain"){
           $hola = readfile($_FILES['archivo']);
           echo $hola;
        }
        if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name'])) {
            echo "ERROR: no se pudo cargar el archivo ";
           }else{
            $ruta = file_get_contents('../archivos/'.$nombre);
            echo "El archivo ".$_FILES["archivo"]["name"]." se ha copiado con Éxito <br />";
            echo "<div>
            <textarea rows=10 cols=50>
            $ruta</textarea>
            </div>";
            }   
    }else{
        echo "no hay archivo";
    }





?>