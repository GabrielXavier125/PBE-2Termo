<?php

// Exercicio 2

$nome = readline("Digite seu nome: ");
$nota = readline("Digite sua nota: ");
if ($nota >= 9) {
    echo "Excelente!";
} else if ($nota >= 7) {
    echo "Bom!";
} else if ($nota < 7) {
    echo "Reprovado!";
}

?>