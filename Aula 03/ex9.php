<?php

// Exercicio 9

$temperatura = readline("Digite a temperatura em graus Celsius: ");
$temperatura = (float)$temperatura;

if ($temperatura < 15) {
    echo "A temperatura $temperatura°C é frio.\n";
} elseif ($temperatura >= 15 && $temperatura <= 25) {
    echo "A temperatura $temperatura°C está agradável.\n";
} else {
    echo "A temperatura $temperatura°C é quente.\n";
}

?>