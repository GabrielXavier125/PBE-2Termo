<?php
// Exercício 1

// Cenário 1 – Viagem pelo Mundo
// Um grupo de turistas vai visitar o Japão, o Brasil e o Acre. Em cada lugar da Terra, eles poderão comer comidas típicas e nadar em rios ou praias.

// Classe = Turistas, Lugar
// Métodos = Visitar, comer, nadar

class Lugar {
    protected $nome;
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    public function comerComidaTipica() {
        echo "Comendo comida típica de {$this->nome}.\n";
    }
    
    public function nadar() {
        echo "Nadando nas águas de {$this->nome}.\n";
    }
}

class Turismo {
    protected $lugares = [];
    
    public function adicionarLugar(Lugar $lugar) {
        $this->lugares[] = $lugar;
    }
    
    public function visitar() {
        foreach ($this->lugares as $lugar) {
            $lugar->comerComidaTipica();
            $lugar->nadar();
        }
    }
}

// Uso
$turismo = new Turismo();
$turismo->adicionarLugar(new Lugar("Japão"));
$turismo->adicionarLugar(new Lugar("Brasil"));
$turismo->adicionarLugar(new Lugar("Acre"));

$turismo->visitar();

?>