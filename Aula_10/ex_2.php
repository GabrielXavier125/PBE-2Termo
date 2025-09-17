<?php
namespace Aula_10;

class Animal {
    public function fazerSom() {
        echo "O som do animal!";
    }
}

class Cachorro extends Animal {
    public function fazerSom() {
        echo "Au au!";
    }
}

class Gato extends Animal {
    public function fazerSom() {
        echo "Miau!";
    }
}

class Vaca extends Animal {
    public function fazerSom() {
        echo "Muuu!";
    }
}

$cachorro = new Cachorro();
$gato = new Gato();
$vaca = new Vaca();

echo "Cachorro: ";
$cachorro->fazerSom();
echo "\n";

echo "Gato: ";
$gato->fazerSom();
echo "\n";

echo "Vaca: ";
$vaca->fazerSom();
echo "\n";

?>