<?php
class Kniha{
    public string $nazov;
    public string $autor;
    public int $rok_vydania;

    public int $stav;

    public function __construct($nazov,$autor,$rok_vydania,$stav){
        $this->nazov = $nazov;
        $this->autor = $autor;
        $this->rok_vydania = $rok_vydania;
        $this->stav = $stav;
    }

        /*  Sety */

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