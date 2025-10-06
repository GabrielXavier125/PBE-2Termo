<?php
// Exercício 6

// Cenário 6 – Leia o enunciado do problema
// Um sistema de cinema deve permitir que clientes comprem ingressos para sessões de filmes."

// Classe = Clientes
// Métodos = Comprem

class Cliente {
    protected $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function comprarIngresso(Sessao $sessao) {
        echo "{$this->nome} comprou um ingresso para o filme '{$sessao->getFilme()}' às {$sessao->getHorario()}.\n";
    }
}

class Sessao {
    protected $filme;
    protected $horario;
    
    public function __construct($filme, $horario) {
        $this->filme = $filme;
        $this->horario = $horario;
    }
    
    public function getFilme() {
        return $this->filme;
    }
    
    public function getHorario() {
        return $this->horario;
    }
}

// Uso
$cliente = new Cliente("Carlos");
$sessao = new Sessao("Matrix", "20:00");

$cliente->comprarIngresso($sessao);

?>