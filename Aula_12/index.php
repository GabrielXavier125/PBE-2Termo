<?php

require_once 'CRUD.php';
require_once 'AlunoDAO.php';

$dao = new AlunoDAO();

$dao->criarAlunos(new Aluno(1, "Hall", "Development")) ;
$dao->criarAlunos(new Aluno(2, "Viper", "Design"));
$dao->criarAlunos(new Aluno(3, "Zeny", "Marketing"));

echo "Listagem inicial:\n";
foreach ($dao->lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

$dao->atualizarAlunos(2, "Viper A", "Design Grafico");
echo "Listagem após Atualização:\n";
foreach ($dao->lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

$dao->excluirAlunos(1);
echo "Listagem após Exclusão:\n";
foreach ($dao->lerAlunos() as $aluno) {
    echo "{$aluno->getId()} - {$aluno->getNome()} - {$aluno->getCurso()}\n";
}

?>