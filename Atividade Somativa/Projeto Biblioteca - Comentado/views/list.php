<!doctype html>
<!--
    views/list.php
    Esta página é responsável por exibir a lista de livros cadastrados
    na biblioteca, além dos botões para cadastrar, editar e excluir.
-->
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Catálogo de Livros - Biblioteca Escolar</title>
    <!-- Importa o arquivo de estilos principal do projeto. -->
    <link rel="stylesheet" href="style.css">

    <!--
        Estilos específicos para a caixa de mensagens de feedback.
        Colocamos aqui para deixar claro visualmente onde a mensagem aparece.
    -->
    <style>
        .alerta {
            background-color: #2ecc71;      /* Cor de fundo (verde de sucesso). */
            color: #ffffff;                 /* Cor do texto em branco. */
            padding: 12px 16px;             /* Espaçamento interno. */
            margin: 16px 0;                 /* Margem acima e abaixo. */
            border-radius: 8px;             /* Bordas arredondadas. */
            font-weight: 600;               /* Texto em negrito. */
            box-shadow: 0 4px 10px rgba(0,0,0,0.1); /* Sombra leve. */
            animation: fadeOut 4s forwards; /* Animação para sumir aos poucos. */
        }

        .alerta.erro {
            background-color: #e74c3c;      /* Vermelho para mensagens de erro. */
        }

        .alerta.info {
            background-color: #f1c40f;      /* Amarelo para mensagens informativas. */
            color: #2c3e50;                 /* Texto mais escuro. */
        }

        @keyframes fadeOut {
            0%   { opacity: 1; }
            70%  { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>
</head>
<body>
    <!-- Cabeçalho da página com o título principal. -->
    <header class="topo">
        <h1>Catálogo de Livros da Biblioteca Escolar</h1>
    </header>

    <!-- Conteúdo principal da página. -->
    <main class="container">

        <!--
            Se existir alguma mensagem de feedback gravada na sessão,
            ela será exibida aqui dentro de uma caixa estilizada.
        -->
        <?php if (!empty($_SESSION['mensagem'])): ?>
            <div class="alerta <?= htmlspecialchars($_SESSION['mensagem_tipo'] ?? 'sucesso') ?>">
                <?= htmlspecialchars($_SESSION['mensagem']) ?>
            </div>
            <?php
            // Após exibir, apagamos a mensagem da sessão para não repetir.
            unset($_SESSION['mensagem'], $_SESSION['mensagem_tipo']);
            ?>
        <?php endif; ?>

        <!-- Seção de ações, com o botão para ir para o formulário de cadastro. -->
        <section class="acoes">
            <a href="index.php?action=form" class="botao botao-primario">
                + Cadastrar novo livro
            </a>
        </section>

        <!-- Seção onde ficará a tabela com a lista de livros. -->
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
                <!--
                    Se não houver livros cadastrados, mostramos uma linha
                    informando que a lista está vazia.
                -->
                <?php if (empty($livros)): ?>
                    <tr><td colspan="6">Nenhum livro cadastrado.</td></tr>
                <?php else: ?>
                    <!--
                        Se houver livros, percorremos o array $livros
                        e exibimos uma linha para cada livro.
                    -->
                    <?php foreach ($livros as $livro): ?>
                    <tr>
                        <!-- Exibe o título do livro, escapando caracteres especiais. -->
                        <td><?= htmlspecialchars($livro->getTitulo()) ?></td>
                        <!-- Exibe o autor do livro. -->
                        <td><?= htmlspecialchars($livro->getAutor()) ?></td>
                        <!-- Exibe o ano de publicação. -->
                        <td><?= htmlspecialchars($livro->getAno()) ?></td>
                        <!-- Exibe o gênero literário. -->
                        <td><?= htmlspecialchars($livro->getGenero()) ?></td>
                        <!-- Exibe a quantidade disponível. -->
                        <td><?= htmlspecialchars($livro->getQuantidade()) ?></td>
                        <td>
                            <!-- Formulário para exclusão de um livro específico. -->
                            <form method="post" action="index.php" style="display:inline">
                                <!-- Define a ação "delete" que será tratada em index.php. -->
                                <input type="hidden" name="action" value="delete">
                                <!-- Passa o título do livro que será excluído. -->
                                <input type="hidden" name="titulo" value="<?= htmlspecialchars($livro->getTitulo()) ?>">
                                <!-- Botão de exclusão, com confirmação em JavaScript. -->
                                <button type="submit" class="botao botao-perigo"
                                    onclick="return confirm('Excluir o livro <?= addslashes($livro->getTitulo()) ?>?')">
                                    Excluir
                                </button>
                            </form>

                            <!-- Link para a tela de edição do livro selecionado. -->
                            <a href="index.php?action=edit&titulo=<?= urlencode($livro->getTitulo()) ?>"
                               class="botao botao-secundario">
                                Editar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
