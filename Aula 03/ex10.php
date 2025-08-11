<?php

// Exercicio 10

for ($i = 0; $i < 5; $i++) {
    // Exibe o menu
    echo "1 - Olá\n";
    echo "2 - Data Atual\n";
    echo "3 - Sair\n";
    echo "Escolha uma opção: ";
    
    $opcao = trim(fgets(STDIN)); 

    switch ($opcao) {
        case 1:
            echo "Olá!\n";
            break;
        case 2:
            echo "Data Atual: " . date('Y-m-d H:i:s') . "\n";
            break;
        case 3:
            echo "Saindo...\n";
            break 2; 
        default:
            echo "Opção inválida. Tente novamente.\n";
    }

    if ($opcao == 3) {
        break;
    }
}

?>