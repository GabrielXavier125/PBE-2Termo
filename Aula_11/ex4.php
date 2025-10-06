<?php
// Exercício 4

// Cenário 4 – Ciclo da Vida
// Na Terra, pessoas podem engravidar, nascer, crescer, fazer escolhas e até doar sangue para ajudar outras.

// Classe = Pessoas
// Métodos = Engravidar, nascer, crescer, fazer, doar

class Pessoa {
    protected $nome;
    protected $idade = 0;
    protected $estaGravida = false;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function engravidar() {
        if (!$this->estaGravida) {
            $this->estaGravida = true;
            echo "{$this->nome} está grávida.\n";
        } else {
            echo "{$this->nome} já está grávida.\n";
        }
    }
    
    public function nascer() {
        echo "Um novo bebê nasceu!\n";
    }
    
    public function crescer() {
        $this->idade++;
        echo "{$this->nome} cresceu. Agora tem {$this->idade} anos.\n";
    }
    
    public function fazerEscolha($escolha) {
        echo "{$this->nome} fez a escolha: {$escolha}.\n";
    }
    
    public function doarSangue() {
        echo "{$this->nome} doou sangue para ajudar outras pessoas.\n";
    }
}

// Uso
$pessoa = new Pessoa("Maria");
$pessoa->engravidar();
$pessoa->nascer();
$pessoa->crescer();
$pessoa->fazerEscolha("estudar medicina");
$pessoa->doarSangue();

?>