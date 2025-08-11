<?php

// Exercicio 8

$numero = readline("Digite um número para ver sua tabuada de 1 a 10: ");
$numero = (int)$numero;

for ($i = 1; $i <= 10; $i++) {
    $resultado = $numero * $i;
    echo "$numero x $i = $resultado\n";
}

?>