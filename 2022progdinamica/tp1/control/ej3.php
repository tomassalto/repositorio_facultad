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
    }
    if(isset($_POST['direccion'])){
        $direccion = $_POST['direccion'];
    }

    echo "<p>Hola yo soy $nombre, $apellido tengo $edad años y vivo en $direccion</p>";
}


?>
