<?php
/**
 * views/edit.php
 *
 * Esta página é responsável por carregar os dados de um livro já
 * cadastrado e exibir um formulário para edição.
 */

// Importa o DAO e o Model necessários para buscar o livro no banco de dados.
require_once __DIR__ . '/../src/Model/LivroDAO.php';
require_once __DIR__ . '/../src/Model/Livro.php';

// Cria uma instância do DAO para acessar a tabela de livros.
$dao = new LivroDAO();

// Recupera o título enviado via GET (na URL).
$titulo = $_GET['titulo'] ?? null;

// Inicializa a variável que guardará o livro buscado.
$livroSelecionado = null;

// Se foi passado um título, tentamos buscar o livro correspondente no banco.
if ($titulo) {
    $livroSelecionado = $dao->buscarPorTitulo($titulo);
}

// Se não encontramos nenhum livro com o título informado, mostramos uma mensagem de erro simples.
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
<?php
// Encerra a execução deste arquivo, pois não há o que editar.
exit;
endif;
?>

<!doctype html>
<!--
    Formulário de edição de um livro já cadastrado.
    Os campos são preenchidos automaticamente com os dados atuais.
-->
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Cabeçalho com o título da página. -->
    <header class="topo">
        <h1>Editar Livro</h1>
    </header>

    <!-- Conteúdo principal da página. -->
    <main class="container">
        <section class="card">
            <!--
                Formulário que envia os dados atualizados do livro.
                Ação "update" será tratada pelo index.php.
            -->
            <form method="post" action="index.php">
                <!-- Indica que esta operação é de atualização. -->
                <input type="hidden" name="action" value="update">
                <!-- Guarda o título original, usado para localizar o registro no banco. -->
                <input type="hidden" name="tituloOriginal" value="<?= htmlspecialchars($livroSelecionado->getTitulo()) ?>">

                <!-- Campo do título, preenchido com o valor atual. -->
                <label>Título:
                    <input type="text" name="titulo" value="<?= htmlspecialchars($livroSelecionado->getTitulo()) ?>" required>
                </label>

                <!-- Campo do autor, preenchido com o valor atual. -->
                <label>Autor:
                    <input type="text" name="autor" value="<?= htmlspecialchars($livroSelecionado->getAutor()) ?>" required>
                </label>

                <!-- Campo do ano, preenchido com o valor atual. -->
                <label>Ano de publicação:
                    <input type="number" name="ano" min="0" max="2100"
                           value="<?= htmlspecialchars($livroSelecionado->getAno()) ?>" required>
                </label>

                <!-- Campo do gênero, preenchido com o valor atual. -->
                <label>Gênero literário:
                    <input type="text" name="genero" value="<?= htmlspecialchars($livroSelecionado->getGenero()) ?>" required>
                </label>

                <!-- Campo da quantidade, preenchido com o valor atual. -->
                <label>Quantidade disponível:
                    <input type="number" name="quantidade" min="0"
                           value="<?= htmlspecialchars($livroSelecionado->getQuantidade()) ?>" required>
                </label>

                <!-- Botões de ação do formulário. -->
                <div class="acoes-form">
                    <!-- Botão para salvar as alterações. -->
                    <button type="submit" class="botao botao-primario">Salvar alterações</button>
                    <!-- Link para cancelar e voltar à lista de livros. -->
                    <a href="index.php" class="botao botao-secundario">Cancelar</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
