<?php
class Libro{
    //Atributos
    private $ISBN;
    private $titulo;
    private $anio;
    private $editorial;
    private $nombreAutor;
    private $apellidoAutor;

    //Constructor
    public function __construct($isbn, $tituloLibro, $anioEd, $editorialLibro, $autorNombre, $autorApellido){
        $this->ISBN = $isbn;
        $this->titulo = $tituloLibro;
        $this->anio = $anioEd;
        $this->editorial = $editorialLibro;
        $this->nombreAutor = $autorNombre;
        $this->apellidoAutor = $autorApellido;
    }

    //Metodos
    //getter y setter 
    public function getISBN(){
        return $this->ISBN;
    }

    public function setISBN($ISBN){
        $this->ISBN = $ISBN;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getAnioEdicion(){
        return $this->anio;
    }

    public function setAnioEdicion($anioEdicion){
        $this->anio = $anioEdicion;
    }

    public function getEditorial(){
        return $this->editorial;
    }

    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }

    public function getNombreAutor(){
        return $this->nombreAutor;
    }

    public function setNombreAutor($nombreAutor){
        $this->nombreAutor = $nombreAutor;
    }

    public function getApellidoAutor(){
        return $this->apellidoAutor;
    }

    public function setApellidoAutor($apellidoAutor){
        $this->apellidoAutor = $apellidoAutor;
    }

    //Metodo toString
    public function __toString(){
        $str = "ISBN: {$this->getISBN()}.\nTítulo: {$this->getTitulo()}.\nAño de edición: {$this->getAnioEdicion()}.\nEditorial: {$this->getEditorial()}.\nNombre del autor: {$this->getNombreAutor()} {$this->getApellidoAutor()}.\n";
        return $str;
    }

    
    public function perteneceEditorial($peditorial){
        $perteneceEditorial = false;
        if($this->editorial == $peditorial){
            $perteneceEditorial = true;
        };
        return $perteneceEditorial;
    }

   
    public function aniosdesdeEdicion(){
        $year = date('Y');
        $aniosPublicado = $year - $this->anioEdicion;
        return $aniosPublicado;
    }
    
 
    public function esIgual($libro){
        $ISBNaComprobar = $libro->getISBN();
        $comprobacion = false;
        if($ISBNaComprobar == $this->getISBN()){
            $comprobacion = true;
        };
        return $comprobacion;
    }
}