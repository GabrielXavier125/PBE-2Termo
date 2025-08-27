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
}