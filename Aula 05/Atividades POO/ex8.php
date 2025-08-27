<?php
class Usuario {
    private $nome;
    private $idade;
    private $cpf;
    private $telefone;
    private $endereco;
    private $estado_civil;
    private $sexo;

    public function __construct($nome, $idade, $cpf, $telefone, $endereco, $estado_civil, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->estado_civil = $estado_civil;
        $this->sexo = $sexo;
    }

    public function mostrarDados() {
        echo "Nome: {$this->nome}<br>";
        echo "Idade: {$this->idade}<br>";
        echo "CPF: {$this->cpf}<br>";
        echo "Telefone: {$this->telefone}<br>";
        echo "Endereço: {$this->endereco}<br>";
        echo "Estado Civil: {$this->estado_civil}<br>";
        echo "Sexo: {$this->sexo}<br>";
    }

    public function casamento($anos_casado) {
        if (strtolower($this->estado_civil) === 'casado') {
            echo "Parabéns pelo seu casamento de {$anos_casado} anos!<br>";
        } else {
            echo "oloco<br>";
        }
    }
}


$usuario1 = new Usuario('Ana', 28, '987.654.321-00', '(21) 99876-5432', 'Rua B, 456', 'Casado', 'Feminino');
$usuario1->mostrarDados();
$usuario1->casamento(5); // Vai exibir mensagem de casamento

echo "<hr>";

$usuario2 = new Usuario('Carlos', 35, '321.654.987-00', '(11) 91234-5678', 'Rua C, 789', 'Solteiro', 'Masculino');
$usuario2->mostrarDados();
$usuario2->casamento(3); // Vai exibir "oloco"

?>