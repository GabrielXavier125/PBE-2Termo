<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Catálogo de Livros - Biblioteca Escolar</title>
    <link rel="stylesheet" href="style.css">

    <!-- CSS das mensagens de feedback -->
    <style>
        .alerta {
            background-color: #2ecc71;
            color: #fff;
            padding: 12px 16px;
            margin: 16px 0;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeOut 4s forwards;
        }

        .alerta.erro {
            background-color: #e74c3c;
        }

        .alerta.info {
            background-color: #f1c40f;
            color: #2c3e50;
        }

        @keyframes fadeOut {
            0%   { opacity: 1; }
            70%  { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <header class="topo">
        <h1>Catálogo de Livros da Biblioteca Escolar</h1>
    </header>

    <main class="container">

        <!-- Caixa de mensagem de feedback -->
        <?php if (!empty($_SESSION['mensagem'])): ?>
            <div class="alerta <?= htmlspecialchars($_SESSION['mensagem_tipo'] ?? 'sucesso') ?>">
                <?= htmlspecialchars($_SESSION['mensagem']) ?>
            </div>
            <?php unset($_SESSION['mensagem'], $_SESSION['mensagem_tipo']); ?>
        <?php endif; ?>

        <section class="acoes">
            <a href="index.php?action=form" class="botao botao-primario">+ Cadastrar novo livro</a>
        </section>

        <section class="lista">
            <table class="tabela">
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
