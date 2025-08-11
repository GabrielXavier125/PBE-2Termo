<?php

$nome = "Gabriel Xavier";

echo "Boa tarde!";
$nota1 = readline(prompt: "Digite a 1º nota do aluno: ");
$nota2 = readline(prompt:"Digite a 2º nota do aluno: ");
$presenca = readline(prompt: "Digite a presenca do aluno: "); // Pressença em porcentagem
$media = ($nota1 + $nota2) / 2;

if (($media >= 7 && $presenca >= 75) || ($media >= 5 && $media < 7 && $presenca >= 90)) {
    echo "O aluno $nome foi aprovado com média $media e presença de $presenca%";
} else if ($media < 5 || $presenca < 75) {
    echo "O aluno $nome foi reprovado com média $media e presença de $presenca%";
} else {
    echo "O aluno $nome está em recuperação com média $media e presença de $presenca%";
} 
?>