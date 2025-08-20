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

?>