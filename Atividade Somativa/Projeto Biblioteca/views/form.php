<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="topo">
        <h1>Cadastrar Novo Livro</h1>
    </header>

    <main class="container">
        <section class="card">
            <form method="post" action="index.php">
                <input type="hidden" name="action" value="create">

                <label>Título:
                    <input type="text" name="titulo" required>
                </label>

                <label>Autor:
                    <input type="text" name="autor" required>
                </label>

                <label>Ano de publicação:
                    <input type="number" name="ano" min="0" max="2100" required>
                </label>

                <label>Gênero literário:
                    <input type="text" name="genero" required>
                </label>

                <label>Quantidade disponível:
                    <input type="number" name="quantidade" min="0" required>
                </label>

                <div class="acoes-form">
                    <button type="submit" class="botao botao-primario">Salvar</button>
                    <a href="index.php" class="botao botao-secundario">Voltar</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
