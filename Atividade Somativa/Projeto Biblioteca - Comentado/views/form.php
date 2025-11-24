<!doctype html>
<!--
    views/form.php
    Esta página exibe o formulário para cadastro de um novo livro
    na biblioteca escolar.
-->
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastrar Livro</title>
    <!-- Importa o CSS principal do projeto. -->
    <link rel="stylesheet" href="style.css">

    <!-- Estilos opcionais para mensagem de erro local no formulário -->
    <style>
        .alerta {
            background-color: #e74c3c;
            color: #ffffff;
            padding: 10px 14px;
            margin-bottom: 15px;
            border-radius: 6px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Cabeçalho com o título da página. -->
    <header class="topo">
        <h1>Cadastrar Novo Livro</h1>
    </header>

    <!-- Conteúdo principal da página. -->
    <main class="container">

        <?php if (!empty($erroCadastro)): ?>
            <div class="alerta">
                <?= htmlspecialchars($erroCadastro) ?>
            </div>
        <?php endif; ?>

        <section class="card">
            <!--
                Formulário de cadastro de livro.
                O método é POST e o destino é index.php,
                que irá tratar a ação "create".
            -->
            <form method="post" action="index.php">
                <!-- Campo oculto indicando que esta operação é de criação. -->
                <input type="hidden" name="action" value="create">

                <!-- Campo de texto para o título do livro. -->
                <label>Título:
                    <input type="text" name="titulo"
                           value="<?= htmlspecialchars($titulo ?? '') ?>" required>
                </label>

                <!-- Campo de texto para o autor do livro. -->
                <label>Autor:
                    <input type="text" name="autor"
                           value="<?= htmlspecialchars($autor ?? '') ?>" required>
                </label>

                <!-- Campo numérico para o ano de publicação. -->
                <label>Ano de publicação:
                    <input type="number" name="ano" min="0" max="2100"
                           value="<?= htmlspecialchars($ano ?? '') ?>" required>
                </label>

                <!-- Campo de texto para o gênero literário. -->
                <label>Gênero literário:
                    <input type="text" name="genero"
                           value="<?= htmlspecialchars($genero ?? '') ?>" required>
                </label>

                <!-- Campo numérico para a quantidade disponível. -->
                <label>Quantidade disponível:
                    <input type="number" name="quantidade" min="0"
                           value="<?= htmlspecialchars($quantidade ?? '') ?>" required>
                </label>

                <!-- Botões de ação do formulário. -->
                <div class="acoes-form">
                    <!-- Botão para enviar o formulário e salvar o livro. -->
                    <button type="submit" class="botao botao-primario">Salvar</button>
                    <!-- Link para voltar à lista de livros sem salvar. -->
                    <a href="index.php" class="botao botao-secundario">Voltar</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
