<?php
class Livro {
    private $id;
    private $titulo;
    private $autor;
    private $ano;
    private $genero;
    private $quantidade;

    public function __construct($titulo, $autor, $ano, $genero, $quantidade, $id = null) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano = (int)$ano;
        $this->genero = $genero;
        $this->quantidade = (int)$quantidade;
    }

    public function getId() { return $this->id; }
    public function getTitulo() { return $this->titulo; }
    public function getAutor() { return $this->autor; }
    public function getAno() { return $this->ano; }
    public function getGenero() { return $this->genero; }
    public function getQuantidade() { return $this->quantidade; }

    public function setId($id) { $this->id = $id; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setAutor($autor) { $this->autor = $autor; }
    public function setAno($ano) { $this->ano = (int)$ano; }
    public function setGenero($genero) { $this->genero = $genero; }
    public function setQuantidade($quantidade) { $this->quantidade = (int)$quantidade; }
}
?>
