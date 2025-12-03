<?php
// Importa a classe de conexão com o banco de dados.
require_once __DIR__ . '/Connection.php';
// Importa a classe que representa um Livro.
require_once __DIR__ . '/Livro.php';

/**
 * Classe LivroDAO (Data Access Object)
 *
 * É responsável por todas as operações de acesso ao banco de dados
 * relacionadas à tabela "livros": criar, ler, atualizar e excluir (CRUD).
 */
class LivroDAO {
    // Atributo que guarda a conexão PDO.
    private $conn;

    /**
     * Construtor do DAO.
     *
     * Assim que a classe é instanciada, abrimos (ou reutilizamos)
     * a conexão com o banco de dados e garantimos que a tabela
     * "livros" exista.
     */
    public function __construct() {
        // Obtém a conexão ativa (ou cria uma nova, se não existir).
        $this->conn = Connection::getInstance();

        // Cria a tabela "livros" caso ela ainda não exista no banco.
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS livros (
                id INT AUTO_INCREMENT PRIMARY KEY,
                titulo VARCHAR(200) NOT NULL UNIQUE,
                autor VARCHAR(150) NOT NULL,
                ano INT NOT NULL,
                genero VARCHAR(100) NOT NULL,
                quantidade INT NOT NULL
            )
        ");
    }

    /**
     * criaLivro
     *
     * Recebe um objeto Livro e insere seus dados na tabela "livros".
     *
     * Retorna:
     *   - true  → se inseriu com sucesso
     *   - false → se deu erro de título duplicado (violação de UNIQUE)
     */
    public function criarLivro(Livro $livro) {
        // Monta o comando SQL de INSERT com parâmetros nomeados.
        $sql = "INSERT INTO livros (titulo, autor, ano, genero, quantidade)
                VALUES (:titulo, :autor, :ano, :genero, :quantidade)";

        try {
            // Prepara o comando para evitar SQL Injection.
            $stmt = $this->conn->prepare($sql);

            // Liga cada parâmetro ao valor correspondente do objeto Livro.
            $stmt->bindValue(':titulo', $livro->getTitulo());
            $stmt->bindValue(':autor', $livro->getAutor());
            $stmt->bindValue(':ano', $livro->getAno(), PDO::PARAM_INT);
            $stmt->bindValue(':genero', $livro->getGenero());
            $stmt->bindValue(':quantidade', $livro->getQuantidade(), PDO::PARAM_INT);

            // Executa o comando no banco de dados.
            $stmt->execute();

            // Se chegou aqui, inseriu com sucesso.
            return true;
        } catch (PDOException $e) {
            // Código SQLSTATE 23000 significa violação de integridade (ex.: UNIQUE).
            if ($e->getCode() === '23000') {
                // Título duplicado, retornamos false para o controller tratar.
                return false;
            }

            // Se for outro erro qualquer, relançamos a exceção para não mascarar problemas.
            throw $e;
        }
    }

    /**
     * lerLivros
     *
     * Lê todos os registros da tabela "livros" e devolve um array
     * de objetos Livro.
     */
    public function lerLivros() {
        // Comando SQL para selecionar todos os livros, ordenados pelo título.
        $sql = "SELECT * FROM livros ORDER BY titulo";

        // Executa a consulta diretamente (sem parâmetros).
        $stmt = $this->conn->query($sql);

        // Array que irá armazenar os objetos Livro.
        $lista = [];

        // Percorre cada linha retornada pela consulta.
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Cria um objeto Livro para cada registro do banco.
            $lista[] = new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['quantidade'],
                $row['id']
            );
        }

        // Retorna a lista completa de livros.
        return $lista;
    }

    /**
     * atualizarLivro
     *
     * Atualiza os dados de um livro já existente, identificado
     * pelo seu título original.
     */
    public function atualizarLivro($tituloOriginal, Livro $livroAtualizado) {
        // Comando SQL para atualizar o registro.
        $sql = "UPDATE livros
                SET titulo = :novoTitulo,
                    autor = :autor,
                    ano = :ano,
                    genero = :genero,
                    quantidade = :quantidade
                WHERE titulo = :tituloOriginal";

        // Prepara o comando SQL para execução.
        $stmt = $this->conn->prepare($sql);

        // Define os parâmetros com base nos getters do objeto Livro.
        $stmt->bindValue(':novoTitulo', $livroAtualizado->getTitulo());
        $stmt->bindValue(':autor', $livroAtualizado->getAutor());
        $stmt->bindValue(':ano', $livroAtualizado->getAno(), PDO::PARAM_INT);
        $stmt->bindValue(':genero', $livroAtualizado->getGenero());
        $stmt->bindValue(':quantidade', $livroAtualizado->getQuantidade(), PDO::PARAM_INT);
        $stmt->bindValue(':tituloOriginal', $tituloOriginal);

        // Executa o comando de atualização no banco.
        $stmt->execute();
    }

    /**
     * excluirLivro
     *
     * Remove um livro da tabela com base em seu título.
     */
    public function excluirLivro($titulo) {
        // Comando SQL de DELETE, usando um parâmetro nomeado.
        $sql = "DELETE FROM livros WHERE titulo = :titulo";

        // Prepara o comando.
        $stmt = $this->conn->prepare($sql);

        // Define o valor do parâmetro.
        $stmt->bindValue(':titulo', $titulo);

        // Executa o comando de exclusão.
        $stmt->execute();
    }

    /**
     * buscarPorTitulo
     *
     * Busca um livro específico pelo título e devolve um objeto Livro,
     * ou null caso nenhum registro seja encontrado.
     */
    public function buscarPorTitulo($titulo) {
        // Comando SQL para buscar o livro pelo título.
        $sql = "SELECT * FROM livros WHERE titulo = :titulo";

        // Prepara a consulta.
        $stmt = $this->conn->prepare($sql);

        // Define o valor do parâmetro.
        $stmt->bindValue(':titulo', $titulo);

        // Executa a consulta.
        $stmt->execute();

        // Obtém a primeira linha de resultado (se existir).
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Se encontrou um registro, monta e retorna um objeto Livro.
        if ($row) {
            return new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['quantidade'],
                $row['id']
            );
        }

        // Se não encontrou nenhum registro, retorna null.
        return null;
    }
}
// Fecha a tag PHP.
?>
