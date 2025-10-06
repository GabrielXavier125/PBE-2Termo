<?php
// Exercício 3

// Cenário 3 – Fantasia e Destino
// John Snow, Papai Smurf, Deadpool e Dexter estão em uma jornada. Durante o caminho, começa a chover, e eles precisam amar uns aos outros para superar as dificuldades. No fim da jornada, eles celebram ao comer juntos.

// Classe = Personagems, Jornada, Clima, Dificuldade
// Métodos = Amar, celebram, comer

class Personagem {
    protected $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function amarOutro() {
        echo "{$this->nome} está amando os outros para superar as dificuldades.\n";
    }
    
    public function comerJuntos() {
        echo "{$this->nome} está celebrando e comendo junto com os outros.\n";
    }
}

class Jornada {
    protected $personagens = [];
    
    public function adicionarPersonagem(Personagem $p) {
        $this->personagens[] = $p;
    }
    
    public function enfrentarChuva() {
        foreach ($this->personagens as $p) {
            $p->amarOutro();
        }
    }
    
    public function celebrar() {
        foreach ($this->personagens as $p) {
            $p->comerJuntos();
        }
    }
}

// Uso
$jornada = new Jornada();
$jornada->adicionarPersonagem(new Personagem("John Snow"));
$jornada->adicionarPersonagem(new Personagem("Papai Smurf"));
$jornada->adicionarPersonagem(new Personagem("Deadpool"));
$jornada->adicionarPersonagem(new Personagem("Dexter"));

echo "Começou a chover...\n";
$jornada->enfrentarChuva();
echo "Celebrando no fim da jornada...\n";
$jornada->celebrar();

// Personagens & Jornada = Associação

?>