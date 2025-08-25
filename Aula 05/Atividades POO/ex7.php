<?php

class Usuarios {
    public $nome;
    public $sexo;

    // Construtor para inicializar o nome e o sexo
    public function __construct($nome, $sexo) {
        $this->nome = $nome;
        $this->sexo = $sexo;
    }

    // Método para testar se o usuário é homem
    public function TestandoReservista() {

        if ($this->sexo == 'M') {
            echo "Apresente seu certificado de reservista do tiro de guerra!";
        } else {
            echo "Tudo certo";
        }
    }
}

// Exemplo de uso:
$usuario1 = new Usuarios("Carlos", "M");
$usuario1->TestandoReservista(); // Exibe: "Apresente seu certificado de reservista do tiro de guerra!"

echo "\n";

$usuario2 = new Usuarios("Maria", "F");
$usuario2->TestandoReservista(); // Exibe: "Tudo certo"

?>