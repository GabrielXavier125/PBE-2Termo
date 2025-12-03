<?php
// Importa a classe responsável por acessar o banco de dados de livros (DAO).
require_once __DIR__ . '/../Model/LivroDAO.php';
// Importa a classe de modelo que representa um livro.
require_once __DIR__ . '/../Model/Livro.php';

/**
 * Classe LivroController
 *
 * Esta classe faz o papel de "Controller" na arquitetura MVC.
 * Ela recebe as requisições vindas do index.php, coordena as
 * operações (usando o DAO e o Model) e devolve os dados prontos
 * para as views.
 */
class LivroController {
    // Atributo privado que guarda uma instância de LivroDAO.
    private $dao;

    /**
     * Construtor da classe.
     * Ao criar um LivroController, já instanciamos um LivroDAO.
     */
    public function __construct() {
        // Cria o objeto DAO que fará a comunicação com o banco de dados.
        $this->dao = new LivroDAO();
    }

    /**
     * Método index
     *
     * Devolve a lista de todos os livros cadastrados no banco.
     * Este método é usado pela página de listagem (views/list.php).
     */
    public function index() {
        // Pede para o DAO ler todos os livros cadastrados.
        return $this->dao->lerLivros();
    }

    /**
     * Método create
     *
     * Recebe os dados de um novo livro (normalmente do formulário),
     * cria um objeto Livro e manda salvar no banco através do DAO.
     *
     * Retorna:
     *   - true  → se conseguiu inserir o livro
     *   - false → se ocorreu erro de título duplicado
     */
    public function create($titulo, $autor, $ano, $genero, $quantidade) {
        // Cria um novo objeto Livro com os dados fornecidos.
        $livro = new Livro($titulo, $autor, $ano, $genero, $quantidade);
        // Pede para o DAO inserir esse livro no banco de dados e devolve o resultado (true/false).
        return $this->dao->criarLivro($livro);
    }

    /**
     * Método delete
     *
     * Recebe o título de um livro que deve ser removido do banco.
     */
    public function delete($titulo) {
        // Pede para o DAO excluir o livro com o título informado.
        $this->dao->excluirLivro($titulo);
    }

    /**
     * Método update
     *
     * Atualiza os dados de um livro já existente.
     * Recebe o título original (para localizar o registro)
     * e também um conjunto de novos dados para atualizar.
     */
    public function update($tituloOriginal, $titulo, $autor, $ano, $genero, $quantidade) {
        // Cria um objeto Livro com os novos dados.
        $livroAtualizado = new Livro($titulo, $autor, $ano, $genero, $quantidade);
        // Pede para o DAO atualizar o registro correspondente no banco.
        $this->dao->atualizarLivro($tituloOriginal, $livroAtualizado);
    }
}
// Fecha a tag PHP.
?>
