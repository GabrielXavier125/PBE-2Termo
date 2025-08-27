<?php

// Exercicio 1

class Moto{
    public $marca;
    public $modelo;
    public $ano;
    public $km;
}

// Exercicio 2

$moto1 = new Moto();
$moto1->marca = "Honda";
$moto1->modelo = "CBX 750F";
$moto1->ano = "1990";
$moto1->km = "72000";

$moto2 = new Moto();
$moto2->marca = "Yamaha";
$moto2->modelo = "Fazer 250";
$moto2->ano = "2018";
$moto2->km = "28000";

$moto3 = new Moto();
$moto3->marca = "BMW";
$moto3->modelo = "R 1200 GS";
$moto3->ano = "2020";
$moto3->km = "15000";



// Exercicio 3/1
class Data {
    private $dia;
    private $mes;
    private $ano;

    public function __construct($dia, $mes, $ano) {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->ano = $ano;
    }

    public function mostrarData() {
        echo "Data: {$this->dia}/{$this->mes}/{$this->ano}<br>";
    }
}

$data = new Data(25, 12, 2023);
$data->mostrarData();


// Exercicio 3/2
class Pessoa {
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
}

$pessoa = new Pessoa('João', 30, '123.456.789-00', '(11) 98765-4321', 'Rua A, 123', 'Solteiro', 'Masculino');
$pessoa->mostrarDados();


// Exercicio 3/3
class Produto {
    private $marca;
    private $nome;
    private $categoria;
    private $data_fabricacao;
    private $data_venda;

    public function __construct($marca, $nome, $categoria, $data_fabricacao, $data_venda) {
        $this->marca = $marca;
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->data_fabricacao = $data_fabricacao;
        $this->data_venda = $data_venda;
    }

    public function mostrarProduto() {
        echo "Marca: {$this->marca}<br>";
        echo "Nome: {$this->nome}<br>";
        echo "Categoria: {$this->categoria}<br>";
        echo "Data de Fabricação: {$this->data_fabricacao}<br>";
        echo "Data de Venda: {$this->data_venda}<br>";
    }
}

$produto = new Produto('Sony', 'PlayStation 5', 'Eletrônicos', '2020-11-12', '2021-01-01');
$produto->mostrarProduto();

?>