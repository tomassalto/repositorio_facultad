<?php
if ($_POST){
    $usuario = $_POST['usuario'] ;
    $contrasenia = $_POST['contrasenia'] ;    

    echo "<p>Usuario: $usuario </p><br/>";
    echo "<p>Contraseña: $contrasenia</p><br />";    
}
else{
    echo "No se recibieron datos<br />";
    }
?>