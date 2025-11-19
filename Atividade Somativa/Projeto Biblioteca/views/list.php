<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Catálogo de Livros - Biblioteca Escolar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topo">
        <h1>Catálogo de Livros da Biblioteca Escolar</h1>
    </header>

    <main class="container">
        <section class="acoes">
            <a href="index.php?action=form" class="botao botao-primario">+ Cadastrar novo livro</a>
        </section>

        <section class="tabela">
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Ano</th>
                        <th>Gênero</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (empty($livros)): ?>
                    <tr><td colspan="6">Nenhum livro cadastrado.</td></tr>
                <?php else: foreach ($livros as $livro): ?>
                    <tr>
                        <td><?= htmlspecialchars($livro->getTitulo()) ?></td>
                        <td><?= htmlspecialchars($livro->getAutor()) ?></td>
                        <td><?= htmlspecialchars($livro->getAno()) ?></td>
                        <td><?= htmlspecialchars($livro->getGenero()) ?></td>
                        <td><?= htmlspecialchars($livro->getQuantidade()) ?></td>
                        <td>
                            <form method="post" action="index.php" style="display:inline">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="titulo" value="<?= htmlspecialchars($livro->getTitulo()) ?>">
                                <button type="submit" class="botao botao-perigo"
                                    onclick="return confirm('Excluir o livro <?= addslashes($livro->getTitulo()) ?>?')">
                                    Excluir
                                </button>
                            </form>

                            <a href="index.php?action=edit&titulo=<?= urlencode($livro->getTitulo()) ?>" class="botao botao-secundario">
                                Editar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
