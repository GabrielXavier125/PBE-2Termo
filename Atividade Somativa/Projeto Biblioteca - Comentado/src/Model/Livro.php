<?php
/**
 * Classe Livro
 *
 * Representa a entidade "Livro" dentro do sistema.
 * Esta classe é usada tanto para transportar dados
 * quanto para centralizar alguma lógica específica de livros
 * (se fosse necessário).
 */
class Livro {
    // Identificador único do livro no banco de dados (chave primária).
    private $id;
    // Título do livro.
    private $titulo;
    // Nome do autor do livro.
    private $autor;
    // Ano de publicação do livro.
    private $ano;
    // Gênero literário do livro (ex.: Fantasia, Romance, etc.).
    private $genero;
    // Quantidade de exemplares disponíveis na biblioteca.
    private $quantidade;

    /**
     * Construtor da classe Livro.
     *
     * @param string   $titulo      Título do livro.
     * @param string   $autor       Autor do livro.
     * @param int      $ano         Ano de publicação.
     * @param string   $genero      Gênero literário.
     * @param int      $quantidade  Quantidade disponível.
     * @param int|null $id          (Opcional) ID do livro no banco de dados.
     */
    public function __construct($titulo, $autor, $ano, $genero, $quantidade, $id = null) {
        // Define o ID (se for passado).
        $this->id = $id;
        // Define o título do livro.
        $this->titulo = $titulo;
        // Define o autor do livro.
        $this->autor = $autor;
        // Converte o ano para inteiro e armazena.
        $this->ano = (int)$ano;
        // Define o gênero literário.
        $this->genero = $genero;
        // Converte a quantidade para inteiro e armazena.
        $this->quantidade = (int)$quantidade;
    }

    // ==================== GETTERS (métodos de leitura) ====================

    // Retorna o ID do livro.
    public function getId() { return $this->id; }
    // Retorna o título do livro.
    public function getTitulo() { return $this->titulo; }
    // Retorna o autor do livro.
    public function getAutor() { return $this->autor; }
    // Retorna o ano de publicação.
    public function getAno() { return $this->ano; }
    // Retorna o gênero literário.
    public function getGenero() { return $this->genero; }
    // Retorna a quantidade disponível.
    public function getQuantidade() { return $this->quantidade; }

    // ==================== SETTERS (métodos de alteração) ====================

    // Define o ID do livro.
    public function setId($id) { $this->id = $id; }
    // Define o título do livro.
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    // Define o autor do livro.
    public function setAutor($autor) { $this->autor = $autor; }
    // Define o ano de publicação, garantindo que seja inteiro.
    public function setAno($ano) { $this->ano = (int)$ano; }
    // Define o gênero do livro.
    public function setGenero($genero) { $this->genero = $genero; }
    // Define a quantidade disponível, garantindo que seja inteiro.
    public function setQuantidade($quantidade) { $this->quantidade = (int)$quantidade; }
}
// Fecha a tag PHP.
?>
