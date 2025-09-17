<?php
namespace Aula_10;

abstract class Transporte {
    abstract public function mover();
}

class Carro extends Transporte {
    public function mover() {
        return "O carro está andando na estrada";
    }
}

class Barco extends Transporte {
    public function mover() {
        return "O barco está navegando no mar";
    }
}

class Avião extends Transporte {
    public function mover() {
        return "O avião está voando no céu";
    }
}

class Elevador extends Transporte {
    public function mover() {
        return "O Elevador está correndo pelo prédio";
    }
}

$carro = new Carro();
echo $carro->mover() . "\n";

$barco = new Barco();
echo $barco->mover() . "\n";

$aviao = new Avião();
echo $aviao->mover() . "\n";

$elevador = new Elevador();
echo $elevador->mover() . "\n";

?>