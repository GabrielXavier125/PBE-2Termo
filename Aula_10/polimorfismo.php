<?php
namespace Aula_10;

// Polimorfismo

// O termo polimorfismo significa "varias formas". Associando isso a Programação Orientada a Objetos, o conceito se trata de várias classes e suas instâncias (objetos) respondendo a um mesmo método de formas diferentes. No exemplo do interface da Aula_09, temos um método CalcularArea() que responde de forma diferente a classe Quadrado, a classe Pentagono e a classe Circulo. Isso quer dizer que a função é a mesma - calcular a área da forma geométrica - mas a operação muda de acordo com a figura.

// Crie um étodo chamado "mover()", aonde ele responde de várias formas diferentes 

interface veiculo {
    public function mover();
}

class Carro implements Veiculo {
    public $nome;
    public function mover() {
        echo "O carro está ($this->nome) está andando";
    }
}

class Aviao implements Veiculo {
    public $nome;
    public function mover() {
        echo "O avião ($this->nome) está voando";
    }
}

$carro1 = new Carro();
$carro1->nome = "Civic";

$carro2 = new Carro();
$carro2->nome = "Corolla";



$aviao = new Aviao();
$aviao->nome = "Boeing 747";

$aviao = new Aviao();
$aviao->nome = "Airbus A320";

?>
