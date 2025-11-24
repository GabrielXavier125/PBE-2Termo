<?php
session_start();

require_once __DIR__ . '/../src/Controller/LivroController.php';

$controller = new LivroController();

$action = $_REQUEST['action'] ?? 'index';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'create') {
        $controller->create(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano'],
            $_POST['genero'],
            $_POST['quantidade']
        );

        // Mensagem de feedback ao adicionar
        $_SESSION['mensagem'] = '📗 Livro adicionado com sucesso!';
        $_SESSION['mensagem_tipo'] = 'sucesso';

        header('Location: index.php');
        exit;

    } elseif ($action === 'update') {
        $controller->update(
            $_POST['tituloOriginal'],
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['ano'],
            $_POST['genero'],
            $_POST['quantidade']
        );

        // Mensagem de feedback ao editar
        $_SESSION['mensagem'] = '✏️ Livro atualizado com sucesso!';
        $_SESSION['mensagem_tipo'] = 'sucesso';

        header('Location: index.php');
        exit;

    } elseif ($action === 'delete') {
        $controller->delete($_POST['titulo']);

        // Mensagem de feedback ao excluir
        $_SESSION['mensagem'] = '❌ Livro removido com sucesso!';
        $_SESSION['mensagem_tipo'] = 'sucesso';

        header('Location: index.php');
        exit;
    }
}

if ($action === 'index') {
    $livros = $controller->index();
    include __DIR__ . '/../views/list.php';
} elseif ($action === 'form') {
    include __DIR__ . '/../views/form.php';
} elseif ($action === 'edit') {
    include __DIR__ . '/../views/edit.php';
} else {
    http_response_code(404);
    echo 'Página não encontrada';
}
?>
