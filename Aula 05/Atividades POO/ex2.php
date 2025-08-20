<?php

class Cachorro {
    public $nome;
    public $raca;
    public $idade;
    public $castrado;
    public $sexo;

    public function __construct($nome, $raca, $idade, $castrado, $sexo) {
        $this->nome = $nome;
        $this->raca = $raca;
        $this->idade = $idade;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }
}

$cachorro1 = new Cachorro("Rex", "Pastor Alemão", 5, true, "Macho");
$cachorro2 = new Cachorro("Luna", "Pug", 3, false, "Fêmea");
$cachorro3 = new Cachorro("Bolt", "Labrador", 4, true, "Macho");
$cachorro4 = new Cachorro("Molly", "Beagle", 2, false, "Fêmea");
$cachorro5 = new Cachorro("Max", "Bulldog", 8, true, "Macho");
$cachorro6 = new Cachorro("Daisy", "Shih Tzu", 1, false, "Fêmea");
$cachorro7 = new Cachorro("Charlie", "Golden Retriever", 7, true, "Macho");
$cachorro8 = new Cachorro("Bella", "Yorkshire", 3, false, "Fêmea");
$cachorro9 = new Cachorro("Rocky", "Boxer", 5, true, "Macho");
$cachorro10 = new Cachorro("Lucy", "Pinscher", 4, false, "Fêmea");

?>