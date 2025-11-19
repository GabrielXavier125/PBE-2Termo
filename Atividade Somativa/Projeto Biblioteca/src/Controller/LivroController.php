<?php
require_once __DIR__ . '/../Model/LivroDAO.php';
require_once __DIR__ . '/../Model/Livro.php';

class LivroController {
    private $dao;

    public function __construct() {
        $this->dao = new LivroDAO();
    }

    public function index() {
        return $this->dao->lerLivros();
    }

    public function create($titulo, $autor, $ano, $genero, $quantidade) {
        $livro = new Livro($titulo, $autor, $ano, $genero, $quantidade);
        $this->dao->criarLivro($livro);
    }

    public function delete($titulo) {
        $this->dao->excluirLivro($titulo);
    }

    public function update($tituloOriginal, $titulo, $autor, $ano, $genero, $quantidade) {
        $livroAtualizado = new Livro($titulo, $autor, $ano, $genero, $quantidade);
        $this->dao->atualizarLivro($tituloOriginal, $livroAtualizado);
    }
}
?>
