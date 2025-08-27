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
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->idade = $idade;
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
        $this->telefone = preg_replace('/[^0-9]/', '', $telefone); // Remove caracteres não numéricos
    }

    public function getTelefone() {  // Getter Telefone
        return $this->telefone; 
    }

    
    
}