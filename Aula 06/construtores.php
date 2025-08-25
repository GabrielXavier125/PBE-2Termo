<?php

class ProdutosMercaods { // Criando Classe
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;

    // Método
    public function atualizarEstoque($qtde_vendida){
        $this->qtde_estoque -= $qtde_vendida;
        return $this->qtde_estoque;
    }
    public function __construct($nome, $categoria, $fornecedor, $qtde_estoque){
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }
}

// Criando objetos sem construtor feito

 $produto1 = new ProdutosMercaods();
 $produto1->nome = "Suco Tang";
 $produto1->categoria = "Bebidas";
 $produto1->fornecedor = "Mondelez";
 $produto1->qtde_estoque = 200;

 $produto2 = new ProdutosMercaods();
 $produto2->nome = "Energetico Monster";
 $produto2->categoria = "Bebidas";
 $produto2->fornecedor = "Coca-Cola";
 $produto2->qtde_estoque = 150;

// Criando Objetos com construtor feito
$produto1 = new ProdutosMercaods ("Suco Tang", "Bebidas", "Mondelez", 200);
$produto2 = new ProdutosMercaods ("Energetico Monster", "Bebidas", "Coca-Cola", 150);

?>