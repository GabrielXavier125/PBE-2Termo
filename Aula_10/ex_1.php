<?php
namespace Aula_10;

interface Forma {
    public function calcularArea();
}

class Quadrado implements Forma {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return $this->lado * $this->lado;
    }
}

class Retangulo implements Forma {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

class Circulo implements Forma {
    private $raio;

    public function __construct($raio) {
        $this->raio = $raio;
    }

    public function calcularArea() {
        return pi() * $this->raio * $this->raio;
    }
}

$quadrado = new Quadrado(5);
$retangulo = new Retangulo(4, 6);
$circulo = new Circulo(3);

echo "Área do quadrado: " . $quadrado->calcularArea() . " unidades quadradas\n";
echo "Área do retângulo: " . $retangulo->calcularArea() . " unidades quadradas\n";
echo "Área do círculo: " . $circulo->calcularArea() . " unidades quadradas\n";
?>
