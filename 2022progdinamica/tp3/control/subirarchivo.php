<?php

$dir = '../archivos/';  // Definimos Directorio donde se guarda el archivo
// Comprobamos que no se hayan producido errores


    if($_FILES['archivo']["error"] <= 0){
        echo "Nombre: " . $_FILES['archivo']['name'] . "<br />";
        echo "Tipo: " . $_FILES['archivo']['type'] . "<br />";
        echo "Tamaño: " . ($_FILES['archivo']["size"] / 1024) . " kB<br />";
        echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name']." <br />";
        if($_FILES['archivo']['type'] == "application/pdf" || $_FILES['archivo']['type'] == "application/doc"){            
            if($_FILES['archivo']['size'] < 999999999999){
                if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name'])) {
                    echo "ERROR: no se pudo cargar el archivo ";
                   }else{
                    echo "El archivo ".$_FILES["archivo"]["name"]." se ha copiado con Éxito <br />";
                    echo "link";
                    }                
            }else{
                echo "el archivo es muy pesado";
            }
        }else{
            echo "El archivo no tiene el formato correcto";
        }
// Intentamos copiar el archivo al servidor.
        
    }else{
    echo "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
    }
 



 ?>