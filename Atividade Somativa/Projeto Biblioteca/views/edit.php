<?php
require_once __DIR__ . '/../src/Model/LivroDAO.php';
require_once __DIR__ . '/../src/Model/Livro.php';

$dao = new LivroDAO();
$titulo = $_GET['titulo'] ?? null;
$livroSelecionado = null;

if ($titulo) {
    $livroSelecionado = $dao->buscarPorTitulo($titulo);
}

if (!$livroSelecionado): ?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Livro não encontrado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topo">
        <h1>Livro não encontrado</h1>
    </header>
    <main class="container">
        <p>O livro informado não foi localizado no catálogo.</p>
        <p><a href="index.php" class="botao botao-secundario">Voltar para a lista</a></p>
    </main>
</body>
</html>
<?php exit; endif; ?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topo">
        <h1>Editar Livro</h1>
    </header>

    <main class="container">
        <section class="card">
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="tituloOriginal" value="<?= htmlspecialchars($livroSelecionado->getTitulo()) ?>">

                <label>Título:
                    <input type="text" name="titulo" value="<?= htmlspecialchars($livroSelecionado->getTitulo()) ?>" required>
                </label>

                <label>Autor:
                    <input type="text" name="autor" value="<?= htmlspecialchars($livroSelecionado->getAutor()) ?>" required>
                </label>

                <label>Ano de publicação:
                    <input type="number" name="ano" min="0" max="2100" value="<?= htmlspecialchars($livroSelecionado->getAno()) ?>" required>
                </label>

                <label>Gênero literário:
                    <input type="text" name="genero" value="<?= htmlspecialchars($livroSelecionado->getGenero()) ?>" required>
                </label>

                <label>Quantidade disponível:
                    <input type="number" name="quantidade" min="0" value="<?= htmlspecialchars($livroSelecionado->getQuantidade()) ?>" required>
                </label>

                <div class="acoes-form">
                    <button type="submit" class="botao botao-primario">Salvar alterações</button>
                    <a href="index.php" class="botao botao-secundario">Cancelar</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
