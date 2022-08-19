<?php
if($_POST){
    $numero = $_POST['numero'];
    if($numero > 0){
        echo "<p>$numero es positivo</p>";
    }else if($numero == 0){
        echo "<p>$numero es cero</p>";
    }else{
        echo "<p>$numero es negativo</p>";
    }

    $link = "../vista/index.html";
    echo "Para volver a la pagina anterior hacer click <a href=".$link."> aca!</a>";

}
?>