<?php
require_once __DIR__ . '/../src/Model/BebidaDAO.php';
require_once __DIR__ . '/../src/Model/Bebida.php';

// Caminho fixo e absoluto para o JSON
$pathData = realpath(__DIR__ . '/../data/bebidas.json');

// Se o arquivo não existir, cria um vazio
if (!$pathData) {
    $dirData = __DIR__ . '/../data';
    if (!is_dir($dirData)) {
        mkdir($dirData, 0777, true);
    }
    $pathData = $dirData . '/bebidas.json';
    file_put_contents($pathData, json_encode([], JSON_PRETTY_PRINT));
}

$dao = new BebidaDAO($pathData);
$bebidas = $dao->getAll();

$nome = $_GET['nome'] ?? null;
$bebidaSelecionada = null;

foreach ($bebidas as $b) {
    if ($b->getNome() === $nome) {
        $bebidaSelecionada = $b;
        break;
    }
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
