<?php

// Exercicio 1

class Carro {
    private $modelo;
    private $marca;

    public function __construct($modelo, $marca) {
        $this->setModelo($modelo);
        $this->setMarca($marca);
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }
}

$carro1 = new Carro("Civic", "Honda");

echo "O modelo do carro é: " . $this->modelo . " e a marca é: " . $this->marca . "\n";



// Exercicio 2

class Pessoa {
    private $nome;
    private $idade;

    private $email;

    public function __construct($nome, $idade, $email) {
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getEmail() {
        return $this->email;
    }
}

$pessoa1 = new Pessoa("Carlos Silva", 30, "carlossilva@gmail.com");

echo "O nome da pessoa é: " . $this->nome . ", a idade é: " . $this->idade . " e o email é: " . $this->email . "\n";



// Exercicio 3

class Aluno {
    private $nome;
    private $nota;

    public function __construct($nome, $nota) {
        $this->setNome($nome);
        $this->setNota($nota);
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setNota($nota) {
        if ($nota >= 0 && $nota <= 10) {
            $this->nota = $nota;
        } else {
            $this->nota = 0;
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function getNota() {
        return $this->nota;
    }
}

// Testes

$aluno1 = new Aluno("Maria", 8.5);
$aluno2 = new Aluno("João", 11);  // Nota inválida, deve virar 0
$aluno3 = new Aluno("Ana", -3);   // Nota inválida, deve virar 0

echo $aluno1->getNome() . " tem nota " . $aluno1->getNota() . "\n";



// Exercicio 4

class Produto{
    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPreco($preco) {
        if ($preco >= 0) {
            $this->preco = $preco;
        } else {
            $this->preco = 0;
        }
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setEstoque($estoque) {
        if ($estoque >= 0) {
            $this->estoque = $estoque;
        } else {
            $this->estoque = 0;
        }
    }

    public function getEstoque() {
        return $this->estoque;
    }
}

$produto1 = new Produto("Notebook", 3500, 10);

echo "O produto " . $this->nome . " custa R$" . $this->preco . " e tem " . $this->estoque . " unidades em estoque.\n";



// Exercicio 5

class Funcionario {
    // Atributos privados
    private $nome;
    private $salario;

    // Setter para o nome
    public function setNome($nome) {
        $this->nome = $nome;
    }

    // Getter para o nome
    public function getNome() {
        return $this->nome;
    }

    // Setter para o salário
    public function setSalario($salario) {
        $this->salario = $salario;
    }

    // Getter para o salário
    public function getSalario() {
        return $this->salario;
    }
}

// Criando um objeto da classe Funcionario
$funcionario = new Funcionario();

// Definindo os valores iniciais
$funcionario->setNome("João");
$funcionario->setSalario(3000);

// Alterando os valores
$funcionario->setNome("Maria");
$funcionario->setSalario(4500);

// Mostrando os valores atuais com os getters
echo "Nome do funcionário: " . $funcionario->getNome() . "\n";
echo "Salário do funcionário: R$ " . $funcionario->getSalario() . "\n";

?>