<?php
class Libro{
    //Atributos
    private $ISBN;
    private $titulo;
    private $anio;
    private $editorial;
    private $objetoPersona;
    private $paginas;
    private $sinopsis;
    // private $nombreAutor;
    // private $apellidoAutor;

    //Constructor
    public function __construct($isbn, $tituloLibro, $anioEd, $editorialLibro, $nombre, $apellido,$tipoDoc,$numDoc,$paginas,$sinopsis){
        $this->ISBN = $isbn;
        $this->titulo = $tituloLibro;
        $this->anio = $anioEd;
        $this->editorial = $editorialLibro;
        $this->objetoPersona = new Persona($nombre, $apellido,$tipoDoc,$numDoc);
        $this->$paginas = $paginas;
        $this->$sinopsis = $sinopsis;
        // $this->nombreAutor = $autorNombre;
        // $this->apellidoAutor = $autorApellido;
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
      /**
     * Get the value of objetoPersona
     */ 
    public function getObjetoPersona()
    {
        $objAutor = $this->objetoPersona;
        return $objAutor->getApellido();
    }

    /**
     * Set the value of objetoPersona
     *
     * @return  self
     */ 
    public function setObjetoPersona($objetoPersona)
    {
        $objAutor = $this->objetoPersona;
        $objAutor->setNombre($objetoPersona);
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

    /**
     * Get the value of sinopsis
     */ 
    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    /**
     * Set the value of sinopsis
     *
     * @return  self
     */ 
    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    // public function getNombreAutor(){
    //     return $this->nombreAutor;
    // }

    // public function setNombreAutor($nombreAutor){
    //     $this->nombreAutor = $nombreAutor;
    // }

    // public function getApellidoAutor(){
    //     return $this->apellidoAutor;
    // }

    // public function setApellidoAutor($apellidoAutor){
    //     $this->apellidoAutor = $apellidoAutor;
    // }

    //Metodo toString
    public function __toString(){
        $str = "ISBN: {$this->getISBN()}.\nTítulo: {$this->getTitulo()}.\nAño de edición: {$this->getAnioEdicion()}.\nEditorial: {$this->getEditorial()}.\n{$this->getObjetoPersona()}.\n Cantidad de paginas: {$this->getPaginas()}.\n Sinopsis: {$this->getSinopsis()}.";
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
        $aniosPublicado = $year - $this->anio;
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