<?php

class Usuario {
    public $nome;
    public $CPF;
    public $sexo;
    public $email;
    public $estado_civil;
    public $cidade;
    public $estado;
    public $endereco;
    public $cep;

    public function __construct($nome, $CPF, $sexo, $email, $estado_civil, $cidade, $estado, $endereco, $cep) {
        $this->nome = $nome;
        $this->CPF = $CPF;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->estado_civil = $estado_civil;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->endereco = $endereco;
        $this->cep = $cep;
    }
}

?>