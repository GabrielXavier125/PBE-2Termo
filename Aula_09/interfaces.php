<?php
// Modificadores de acesso:
//Existem 3 tipos: Public, Private e Protected
//Public NomeDoAtributo: métodos e atributos publicos

//Private NomeDoAtributo: métodos e atributos privados para acesso somente dentro da classe. Utilizamos os getters e setters para acessar esses atributos fora da classe.

//Protected NomeDoAtributo: métodos e atributos protegidos para acesso somente dentro da classe e suas subclasses.

//Pacotes: sintaxe logo no inicio do código, que atribui de onde os arquivos pertecem, ou seja, o caminho da pasta em que ele está contido. Exemplo:
//namespace Aula 09;

//Caso tenha mais arquivos que formam o backEnd de uma página WEB e possuem a mesma raiz, o namespace será o mesmo.

namespace Aula_09;

// Interfaces: É um recurso no qual garante que obrigatoriamente a classe tenha que contribuir com algum método préviamente determinado. Funciona como uma promessa ou contrato.
//Exemplo: Configuramos uma interface "Pagamento" que faz com que qualquer classe que a implemente, tenha que obrigatoriamente construir o método "pagar".

interface Pagamento {  // Interface de contrato de pagamento
    public function pagar($valor);
}

class CartaoDeCredito implements Pagamento {  // Implementa a interface Pagamento
    public function pagar($valor) {
        echo "Pagamento realizado com cartão de crédito, valor: $valor\n.";
    }
}

class PIX implements Pagamento {  // Implementa a interface Pagamento
    public function pagar($valor) {
        echo "Pagamento realizado via PIX, valor: $valor\n.";
    }
}

class Dinheiro implements Pagamento {  // Implementa a interface Pagamento
    public function pagar($valor) {
        echo "Pagamento realizado em dinheiro, valor: ".($valor-$valor*0.1)."\n";  // Desconto de 10% para pagamento em dinheiro
    }
}

// Neste exemplo criamos um objeto chamado "$cred" da classe "CartaoDeCredito" e depois chamamos o método "pagar" para este objeto, passando R$250 como parâmetro.

$cred = new CartaoDeCredito();  //Criando Objeto
echo "Testando pagamento cartão de credito. ". $cred->pagar(250);


$pix = new PIX();  //Criando Objeto
echo "Testando pagamento pix. ". $pix->pagar(100);


$dinheiro = new Dinheiro();  //Criando Objeto
echo "Testando pagamento dinheiro. ". $dinheiro->pagar(200);

?>