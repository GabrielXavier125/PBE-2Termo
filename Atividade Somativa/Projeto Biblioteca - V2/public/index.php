<?php
// Inicia a sessão para permitir o uso de variáveis de sessão (ex.: mensagens de feedback).
session_start();

// Inclui o arquivo do controlador de livros, responsável pela regra de negócio.
require_once __DIR__ . '/../src/Controller/LivroController.php';

// Cria uma instância do controlador de livros para manipular as operações.
$controller = new LivroController();

// Lê o parâmetro "action" enviado pela URL (via GET ou POST).
// Se nenhuma ação for informada, a ação padrão será "index" (listagem de livros).
$action = $_REQUEST['action'] ?? 'index';

// Verifica se a requisição atual foi feita via método POST (envio de formulário).
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ====== CRIAÇÃO DE LIVRO ======
    if ($action === 'create') {
        // Tenta criar o livro. O método retorna true em caso de sucesso e false se for título duplicado.
        $sucesso = $controller->create(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano'],
            $_POST['genero'],
            $_POST['quantidade']
        );

        if ($sucesso) {
            // Salva na sessão uma mensagem de sucesso para aparecer na próxima tela.
            $_SESSION['mensagem'] = '📗 Livro adicionado com sucesso!';
            $_SESSION['mensagem_tipo'] = 'sucesso';

            // Redireciona o usuário de volta para a página inicial (lista de livros).
            header('Location: index.php');
            exit;
        } else {
            // Aqui é o caso de TÍTULO DUPLICADO (não vamos redirecionar)
            // Apenas mostramos uma mensagem de erro na própria tela de cadastro
            // e mantemos os campos preenchidos.

            $erroCadastro = 'Não é possivel criar o livro, pois já possui o outro com o mesmo nome.';

            // Repassa os valores enviados para reaproveitar no formulário.
            $titulo      = $_POST['titulo'] ?? '';
            $autor       = $_POST['autor'] ?? '';
            $ano         = $_POST['ano'] ?? '';
            $genero      = $_POST['genero'] ?? '';
            $quantidade  = $_POST['quantidade'] ?? '';

            // Carrega novamente o formulário de cadastro.
            include __DIR__ . '/../views/form.php';
            exit;
        }

    // ====== ATUALIZAÇÃO DE LIVRO ======
    } elseif ($action === 'update') {
        // Chama o método "update" do controlador com os dados do formulário e o título original.
        $controller->update(
            $_POST['tituloOriginal'],
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano'],
            $_POST['genero'],
            $_POST['quantidade']
        );

        // Define mensagem de sucesso informando que o livro foi atualizado.
        $_SESSION['mensagem'] = '✏️ Livro atualizado com sucesso!';
        $_SESSION['mensagem_tipo'] = 'sucesso';

        // Redireciona de volta para a lista de livros.
        header('Location: index.php');
        exit;

    // ====== EXCLUSÃO DE LIVRO ======
    } elseif ($action === 'delete') {
        // Chama o método "delete" do controlador, passando o título do livro a ser removido.
        $controller->delete($_POST['titulo']);

        // Define mensagem de sucesso informando que o livro foi removido.
        $_SESSION['mensagem'] = '❌ Livro removido com sucesso!';
        $_SESSION['mensagem_tipo'] = 'sucesso';

        // Redireciona de volta para a lista de livros.
        header('Location: index.php');
        exit;
    }
}

// A partir deste ponto, tratamos as requisições que normalmente chegam via GET,
// para decidir qual tela (view) será carregada.

// Quando a ação for "index", buscamos os livros e carregamos a view de listagem.
if ($action === 'index') {
    // Chama o método "index" do controlador, que devolve a lista de livros cadastrados.
    $livros = $controller->index();
    // Inclui o arquivo de view responsável por exibir a tabela de livros.
    include __DIR__ . '/../views/list.php';

// Quando a ação for "form", exibimos o formulário de cadastro de novo livro.
} elseif ($action === 'form') {
    // Garante que as variáveis existam (para não dar notice caso venham vazias).
    $titulo     = $titulo     ?? '';
    $autor      = $autor      ?? '';
    $ano        = $ano        ?? '';
    $genero     = $genero     ?? '';
    $quantidade = $quantidade ?? '';
    $erroCadastro = $erroCadastro ?? null;

    // Inclui o arquivo de view com o formulário de criação de novo livro.
    include __DIR__ . '/../views/form.php';

// Quando a ação for "edit", exibimos o formulário de edição de um livro existente.
} elseif ($action === 'edit') {
    // Inclui o arquivo de view responsável por carregar o formulário de edição.
    include __DIR__ . '/../views/edit.php';

// Caso a ação não seja nenhuma das esperadas, retornamos um erro 404 (página não encontrada).
} else {
    // Define o código de status HTTP como 404 (não encontrado).
    http_response_code(404);
    // Exibe uma mensagem simples informando que a página não foi encontrada.
    echo 'Página não encontrada';
}
// Fecha a tag PHP do arquivo.
?>
