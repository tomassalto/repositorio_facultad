<?php
include "Libro.php";
$arrayLibros = [];
$objLibro = new Libro(333, 'Martin Fierro', 2021, 'Pepito', 'Julio', 'Cortazar');
$libro1 = $objLibro;
array_push($arrayLibros, $objLibro);
$objLibro = new Libro(124, 'El principito', 1999, 'Ivrea', 'Jose', 'San Martin');
$libro2 = $objLibro;
array_push($arrayLibros, $objLibro);

if(iguales($objLibro, $arrayLibros)){
    echo "El libro ya esta cargado.\n";
}else{
    echo "El libro no esta cargado.\n";
}

// $array = librosdeEditoriales($arrayLibros, 'Cambalache');
// print_r($array);


//getter y setter de isbn
$ISBN = $objLibro->getISBN();
echo "El ISBN es: $ISBN.\n";
$objLibro->setISBN(10005423);

//getter y setter de titulo
$titulo = $objLibro->getTitulo();
echo "El título es: $titulo.\n";
$objLibro->setTitulo('Tomas y sus aventuras');

//getter y setter del año de edicion
$anioEdicion = $objLibro->getAnioEdicion();
echo "El año de edición fue: $anioEdicion.\n";
$objLibro->setAnioEdicion(2000);

//getter y setter de editorial
$editorial = $objLibro->getEditorial();
echo "La editorial es: $editorial.\n";

//getter y setter de nombre y apellidod el autor
$autorNombre = $objLibro->getNombreAutor();
$autorApellido = $objLibro->getApellidoAutor();
$nombreCompleto = $autorNombre . ' ' . $autorApellido;
echo "El autor es $nombreCompleto.\n";

//toString
echo $objLibro->__toString();

$editorialConsulta = 'Rincon del Vago';
if($objLibro->perteneceEditorial($editorialConsulta)){
    echo "El libro pertenece a la editorial $editorialConsulta.\n";
}else{
    echo "El libro no pertenece a la editorial $editorialConsulta.\n";
};

$nombreLibro = $objLibro->getTitulo();
$aniosDePublicado = $objLibro->aniosdesdeEdicion();
echo "El libro $nombreLibro fue publicado hace $aniosDePublicado años.\n";

$comprobado = $objLibro->esIgual($libro1);
if($comprobado){
    echo "Ambos libros poseen igual ISBN.\n";
}else{
    echo "Son dos libros diferentes.\n";
}

/**Funcion para ver si un libro esta en el array 
 */
function iguales($libro, $libreria){
    $esta = false;
    if(in_array($libro, $libreria)){
        $esta = true;
    };
    return $esta;
}

/**Funcion para saber todos los libros publicados por una editorial
 */
// function librosdeEditoriales($libreria, $editorial){
//     $arrayEditorial = [];
//     foreach ($libreria as $key => $value) {
//         $libro = $value;
//         $editorialLibro = $value->getEditorial();
//         if($editorialLibro == $editorial){
//             array_push($arrayEditorial, $libro);
//         };
//     };
//     return $arrayEditorial;
// }

