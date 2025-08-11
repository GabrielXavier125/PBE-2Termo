<?php

// Exercicio 4

$numero1 = readline("Digite o 1º número: ");
$numero2 = readline("Digite o 2º número: ");
$operacao = readline("Digite a operação (+, -, *, /): ");

switch ($operacao) {
    case '+':
        $resultado = $numero1 + $numero2;
        echo "O resultado da soma é: $resultado";
        break;
    case '-':
        $resultado = $numero1 - $numero2;
        echo "O resultado da subtração é: $resultado";
        break;
    case '*':
        $resultado = $numero1 * $numero2;
        echo "O resultado da multiplicação é: $resultado";
        break;
    case '/':
        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
            echo "O resultado da divisão é: $resultado";
        } else {
            echo "Erro: Divisão por zero não é permitida.";
        }
        break;
    default:
        echo "Operação inválida.";
        break;
}

?>