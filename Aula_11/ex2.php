<?php
// Exercício 2

// Cenário 2 – Heróis e Personagens
// O Batman, o Superman e o Homem-Aranha estão em uma missão. Eles precisam fazer treinamentos especiais no Cotil e, depois, irão ao shopping para doar brinquedos às crianças.

// Classe = Heróis
// Métodos = Treinamento, Doar

class Heroi {
    protected $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function treinar() {
        echo "{$this->nome} está treinando no Cotil.\n";
    }
    
    public function doarBrinquedos() {
        echo "{$this->nome} está doando brinquedos no shopping.\n";
    }
}

class Missao {
    protected $herois = [];
    
    public function adicionarHeroi(Heroi $heroi) {
        $this->herois[] = $heroi;
    }
    
    public function executarMissao() {
        foreach ($this->herois as $heroi) {
            $heroi->treinar();
            $heroi->doarBrinquedos();
        }
    }
}

// Uso
$missao = new Missao();
$missao->adicionarHeroi(new Heroi("Batman"));
$missao->adicionarHeroi(new Heroi("Superman"));
$missao->adicionarHeroi(new Heroi("Homem-Aranha"));

$missao->executarMissao();

?>