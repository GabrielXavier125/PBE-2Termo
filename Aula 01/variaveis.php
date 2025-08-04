<?php 
/*coemntáro do código PHP*/
// Comentário de uma linha 

    echo "Olá Mundo! \n";
    $nome = "Gabriel! \n";
    $idade = 20;
    $ano_atual = "2025";

    $data_nasc= $ano_atual - $idade;
    echo $nome, "Você nasceu em ", $data_nasc, "\n";
    echo "Você tem ", $idade, " anos.\n";

?>

// Exercício - 1 

<?php

    $nome = "Gabriel";
    $idade = 20;
    echo "Olá, meu nome é $nome e tenho $idade anos.\n";

?>

// Exercício - 2

<?php 

    $frase1 = "O PHP foi criado em mil novecentos e noventa e cinco.";
    $frase2 = "O PHP FOI CRIADO EM MIL NOVECENTOS E NOVENTA E CINCO.";
    echo strtolower($frase1), "\n";
    echo strtoupper($frase2), "\n";

?>

// Exercício - 3

<?php

    // Alternativa usando várias chamadas de str_replace
    $frase3 = str_replace(search: ["o", "O", "a", "i"], replace: ["0", "0", "4", "1"], subject: "O PHP foi criado em mil novecentos e noventa e cinco.");
    echo $frase3, "\n";
?>
