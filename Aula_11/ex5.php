<?php
// Exercício 5

// Cenário 5 – Analise o problema com linguagem natural
// Um sistema de biblioteca deve permitir que usuários (alunos e professores) façam empréstimos de livros e revistas."

// Classe = Alunos, Professores
// Métodos = Emprestimos

// Classe base para usuários
class Usuario {
    protected $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function fazerEmprestimo(Emprestimo $emprestimo) {
        echo "{$this->nome} fez um empréstimo do item: {$emprestimo->getItem()->getTitulo()}.\n";
    }
}

// Aluno e Professor herdam de Usuario
class Aluno extends Usuario {
    // Se desejar adicionar $nota, defina o construtor aqui
    // public function __construct($nome, $nota) {
    //     parent::__construct($nome);
    //     $this->nota = $nota;
    // }
}
class Professor extends Usuario {
    // Se desejar adicionar argumentos extras, defina o construtor aqui
}

// Classe base para itens da biblioteca
class ItemBiblioteca {
    protected $titulo;

    public function __construct($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }
}

// Livro e Revista herdam de ItemBiblioteca
class Livro extends ItemBiblioteca {}
class Revista extends ItemBiblioteca {}

// Classe de empréstimo
class Emprestimo {
    protected $usuario;
    protected $item;

    public function __construct(Usuario $usuario, ItemBiblioteca $item) {
        $this->usuario = $usuario;
        $this->item = $item;
    }

    public function getItem() {
        return $this->item;
    }
}

// ========== USO ==========
$aluno = new Aluno("João", 9.5);
$professor = new Professor("Dra. Ana");

$livro = new Livro("Programação em PHP");
$revista = new Revista("Ciência Hoje");

$emprestimo1 = new Emprestimo($aluno, $livro);
$emprestimo2 = new Emprestimo($professor, $revista);

$aluno->fazerEmprestimo($emprestimo1);
$professor->fazerEmprestimo($emprestimo2);

?>