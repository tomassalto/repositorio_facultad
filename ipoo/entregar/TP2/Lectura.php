<?php

include "Libro.php";

class Lectura{

    private $objLibroLeyendo;
    private $coleccionLecturas = [];
    private $paginas;


    public function __construct($objLibroEnLectura,$paginas){

        if(!in_array($objLibroEnLectura, $this->coleccionLecturas)){
            $this->objLibroLeyendo = $objLibroEnLectura;
            $this->paginas = $paginas;
            array_push($this->coleccionLecturas, $objLibroEnLectura);
        }
        
        // $this->libro = new Libro($isbn,$tituloLibro,$anioed,$editorialLibro,$autorNombre,$autorApellido,$paginasLibro,$sinopsis);
        // $this->infoLibro = $infoLibro;
        // $this->paginas = $paginas;
    }

    


    /**
     * Get the value of libro
     */ 
    public function getLibro(){
      
       return $this->objLibroLeyendo->__toString();
    }

    /**
     * Set the value of libro
     *
     * @return  self
     */ 
    public function setLibro($isbn,$tituloLibro,$anioed,$editorialLibro,$autorNombre,$autorApellido)
    {
        $objLibro = $this->objLibroLeyendo;
        $objLibro->setISBN($isbn);
        $objLibro->setTitulo($tituloLibro);
        $objLibro->setAnioEdicion($anioed);
        $objLibro->setEditorial($editorialLibro);
        $objLibro->setNombreAutor($autorNombre);
        $objLibro->setApellidoAutor($autorApellido);
    }

   
    /**
     * Get the value of paginas
     */ 
    public function getPaginas()
    {
        return $this->paginas;
    }

    /**
     * Set the value of paginas
     *
     * @return  self
     */ 
    public function setPaginas($paginas)
    {
        $this->paginas = $paginas;

        return $this;
    }

    public function siguientePagina(){

        $numPag = $this->getPaginas();
        if($numPag){
            $numPag++;
        }
        return $numPag;
    }

    public function retrocederPagina(){

        $numPag = $this->getPaginas();
        if($numPag){
            $numPag--;
        }
        return $numPag;
    }

    public function irPagina($numPag){
       
        $numPag = $this->getPaginas();
        $actualizar = $this->setPaginas($numPag);
        return $numPag.$actualizar;

    }

    /**
     * Get the value of coleccionLectura
     */ 
    public function getColeccionLectura()
    {
        return $this->coleccionLecturas;
    }

    /**
     * Set the value of coleccionLectura
     *
     * @return  self
     */ 
    public function setColeccionLectura($coleccionLectura)
    {
        $this->coleccionLecturas = $coleccionLectura;

        return $this;
    }
}


?> 