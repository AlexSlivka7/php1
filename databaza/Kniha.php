<?php
class Kniha{

    private int $id;
    private string $nazov;
    private string $autor;
    private int $rok_vydania;

    private int $stav;

    public function __construct($nazov,$autor,$rok_vydania,$stav){
        $this->nazov = $nazov;
        $this->autor = $autor;
        $this->rok_vydania = $rok_vydania;
        $this->stav = $stav;
    }

        /*  Sety */


    public function setId($id){
        $this->id = $id;
    }

    public function setNazov($nazov){
        $this->nazov = $nazov;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setRok_vydania($rok_vydania){
        $this->rok_vydania = $rok_vydania;
    }

    public function setStav($stav){
        $this->stav = $stav;
    }

        /*  Gety */


    public function getId(){
        return $this->id;
    }

    public function getNazov(){
        return $this->nazov;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getRok_vydania(){
        return $this->rok_vydania;
    }

    public function getStav(){
        return $this->stav;
    }
}

?>