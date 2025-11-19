<?php
require_once 'Connection.php';
require_once 'Livro.php';

class LivroDAO {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getInstance();

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

    public function criarLivro(Livro $livro) {
        $sql = "INSERT INTO livros (titulo, autor, ano, genero, quantidade)
                VALUES (:titulo, :autor, :ano, :genero, :quantidade)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':titulo', $livro->getTitulo());
        $stmt->bindValue(':autor', $livro->getAutor());
        $stmt->bindValue(':ano', $livro->getAno(), PDO::PARAM_INT);
        $stmt->bindValue(':genero', $livro->getGenero());
        $stmt->bindValue(':quantidade', $livro->getQuantidade(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function lerLivros() {
        $sql = "SELECT * FROM livros ORDER BY titulo";
        $stmt = $this->conn->query($sql);
        $lista = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Livro(
                $row['titulo'],
                $row['autor'],
                $row['ano'],
                $row['genero'],
                $row['quantidade'],
                $row['id']
            );
        }

        return $lista;
    }

    public function atualizarLivro($tituloOriginal, Livro $livroAtualizado) {
        $sql = "UPDATE livros
                SET titulo = :novoTitulo,
                    autor = :autor,
                    ano = :ano,
                    genero = :genero,
                    quantidade = :quantidade
                WHERE titulo = :tituloOriginal";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':novoTitulo', $livroAtualizado->getTitulo());
        $stmt->bindValue(':autor', $livroAtualizado->getAutor());
        $stmt->bindValue(':ano', $livroAtualizado->getAno(), PDO::PARAM_INT);
        $stmt->bindValue(':genero', $livroAtualizado->getGenero());
        $stmt->bindValue(':quantidade', $livroAtualizado->getQuantidade(), PDO::PARAM_INT);
        $stmt->bindValue(':tituloOriginal', $tituloOriginal);
        $stmt->execute();
    }

    public function excluirLivro($titulo) {
        $sql = "DELETE FROM livros WHERE titulo = :titulo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->execute();
    }

    public function buscarPorTitulo($titulo) {
        $sql = "SELECT * FROM livros WHERE titulo = :titulo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':titulo', $titulo);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
        return null;
    }
}
?>
