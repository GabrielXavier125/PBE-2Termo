<?php

class Animal {
    private $especie;
    private $habitat;
    private $sexo;
    private $alimentacao;

    public function __construct($especie, $habitat, $sexo, $alimentacao) {
        $this->setEspecie($especie);
        $this->setHabitat($habitat);
        $this->setSexo($sexo);
        $this->setAlimentacao($alimentacao);
    }

    public function setEspecie($especie) {
        $this->especie = $especie;
    }

    public function getEspecie() {
        return $this->especie;
    }

    public function setHabitat($habitat) {
        $this->habitat = $habitat;
    }

    public function getHabitat() {
        return $this->habitat;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setAlimentacao($alimentacao) {
        $this->alimentacao = $alimentacao;
    }

    public function getAlimentacao() {
        return $this->alimentacao;
    }
}

class Cachorro extends Animal {
    private $raca;
    public function __construct($especie, $habitat, $sexo, $alimentacao, $raca) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this->setRaca($raca);
    }

    public function setRaca($raca) {
        $this->raca = $raca;
    }

    public function getRaca() {
        return $this->raca;
    }

}

class Pangolim extends Animal {
    private $escamas;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $escamas) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this->escamas = $escamas;
    }
}

class Macaco extends Animal {
    private $tempo_dormindo;
    private $qtdes_bananas;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $tempo_dormindo, $qtdes_bananas) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this->tempo_dormindo = $tempo_dormindo;
        $this->qtdes_bananas = $qtdes_bananas;
        
    }
}

class Gato extends Animal{
    private $tipo_ronronamento;

    public function __construct($especie, $habitat, $sexo, $alimentacao, $tipo_ronronamento) {
        parent::__construct($especie, $habitat, $sexo, $alimentacao);

        $this->tipo_ronronamento = $tipo_ronronamento;
    }
} 