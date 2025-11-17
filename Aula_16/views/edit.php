<?php
require_once __DIR__ . '/../src/Model/BebidaDAO.php';
require_once __DIR__ . '/../src/Model/Bebida.php';

// Cria a instância do DAO
$dao = new BebidaDAO();

// Busca a bebida pelo nome usando o novo método
$nome = $_GET['nome'] ?? null;
$bebidaSelecionada = null;

if ($nome) {
    $bebidaSelecionada = $dao->buscarPorNome($nome);
}

if (!$bebidaSelecionada) {
    die("Bebida não encontrada!");
}

$categorias = [
    "Refrigerante", "Cerveja", "Vinho", "Destilado", "Água", "Suco", "Energético"
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Bebida</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Bebida</h1>

    <form method="POST" action="/">
        <input type="hidden" name="action" value="update">
        <!-- Campo oculto para armazenar o nome original -->
        <input type="hidden" name="nome_original" value="<?= htmlspecialchars($bebidaSelecionada->getNome()) ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($bebidaSelecionada->getNome()) ?>" required>

        <label>Categoria:</label>
        <select name="categoria" required>
            <?php foreach ($categorias as $cat): ?>
                <option value="<?= htmlspecialchars($cat) ?>"
                    <?= $cat === $bebidaSelecionada->getCategoria() ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cat) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Volume:</label>
        <input type="text" name="volume" value="<?= htmlspecialchars($bebidaSelecionada->getVolume()) ?>" required>

        <label>Valor:</label>
        <input type="number" step="0.01" name="valor" value="<?= htmlspecialchars($bebidaSelecionada->getValor()) ?>" required>

        <label>Quantidade:</label>
        <input type="number" name="qtde" value="<?= htmlspecialchars($bebidaSelecionada->getQtde()) ?>" required>

        <button type="submit">Salvar alterações</button>
        <a href="/">Cancelar</a>
    </form>
</body>
</html>