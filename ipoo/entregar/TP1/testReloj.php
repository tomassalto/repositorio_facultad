<?php

include "Reloj.php";

$relojito = new Reloj(5,59,57);
$opcion = 0;
echo $relojito->__toString();



do{
    echo "Desea aumentar los segundos? (1): "."\n";
    echo "Desea restablecer la hora a 00:00:00? (2): ";
    $opcion = trim(fgets(STDIN));
    if($opcion == 1){
        $relojito->incrementar();
        
        echo $relojito->__toString();
    }
    if($opcion == 2){
        $relojito->ponerEnCero();
        echo $relojito->__toString();
    }
}while($opcion == 1 || $opcion == 2);

?>