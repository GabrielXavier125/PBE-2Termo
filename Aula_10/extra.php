<?php
namespace Aula_10;

interface Movel {
    public function mover();
}

interface Abastecivel {
    public function abastecer($quantidade);
}

interface Manutenivel {
    public function fazerManutencao();
}

class Carro implements Movel, Abastecivel {
    public function mover() {
        echo "O carro está se movimentando.\n";
    }

    public function abastecer($quantidade) {
        echo "O carro foi abastecido com {$quantidade} litros.\n";
    }
}

class Bicicleta implements Movel, Manutenivel {
    public function mover() {
        echo "A bicicleta está pedalando.\n";
    }

    public function fazerManutencao() {
        echo "A bicicleta foi lubrificada.\n";
    }
}

class Onibus implements Movel, Abastecivel, Manutenivel {
    public function mover() {
        echo "O ônibus está transportando passageiros.\n";
    }

    public function abastecer($quantidade) {
        echo "O ônibus foi abastecido com {$quantidade} litros.\n";
    }

    public function fazerManutencao() {
        echo "O ônibus está passando por revisão.\n";
    }
}


echo "=== Testando Carro ===\n";
$carro = new Carro();
$carro->mover();
$carro->abastecer(30);

echo "\n=== Testando Bicicleta ===\n";
$bicicleta = new Bicicleta();
$bicicleta->mover();
$bicicleta->fazerManutencao();

echo "\n=== Testando Ônibus ===\n";
$onibus = new Onibus();
$onibus->mover();
$onibus->abastecer(100);
$onibus->fazerManutencao();

?>