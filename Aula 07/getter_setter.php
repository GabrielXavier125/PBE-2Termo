<?php

// Criando a Classe Pessoa
class Pessoa {
    private $nome;
    private $cpf;
    private $telefone;
    private $idade;
    private $email;
    private $senha;

    // Criando construtor para a classe Pessoa
    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha) {
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
        $this->setIdade($idade);
        $this->email = $email;
        $this->senha = $senha;
    }

    // Getter e Setter para $nome
    public function setNome($nome) {  // Setter Nome
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome() {  // Getter Nome
        return $this->nome;
    }

    // Getter e Setter para $cpf
    public function setCpf($cpf) {  // Setter CPF
        $this->cpf = preg_replace('/\D/', '', $cpf); // Remove caracteres não numéricos
    }

    public function getCpf() {  // Getter CPF
        return $this->cpf;
    }

    public function setTelefone($telefone) {  // Setter Telefone
        $this->telefone = preg_replace('/\D/', '', $telefone); // Remove caracteres não numéricos
    }

    public function getTelefone() {  // Getter Telefone
        return $this->telefone; 
    }

    public function setIdade($idade) {  // Setter Idade
        $this->idade = abs((int)$idade); // Garante que a idade seja um número inteiro positivo
    }
    
    public function getIdade() {  // Getter Idade
        return $this->idade;
    }
}

$aluno1 = new Pessoa ("Gabriel Xavier", "123.456.789-00", "(11) 91234-5678", 20, "meuemail@gmail.com", "minhasenha123");

echo $aluno1->getNome(); // Saída: Gabriel Xavier