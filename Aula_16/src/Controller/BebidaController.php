<?php
require_once __DIR__ . '/../Model/BebidaDAO.php';
require_once __DIR__ . '/../Model/Bebida.php';

class BebidaController {
    private $dao;

    public function __construct() {
        $this->dao = new BebidaDAO();
    }

    // retorna array de Bebida
    public function index() {
        return $this->dao->lerBebidas();
    }

    public function create($nome, $categoria, $volume, $valor, $qtde) {
        $bebida = new Bebida($nome, $categoria, $volume, (float)$valor, (int)$qtde);
        $this->dao->criarBebida($bebida);
    }

    public function delete($nome) {
        $this->dao->excluirBebida($nome);
    }

    public function update($nomeOriginal, $nome, $categoria, $volume, $valor, $qtde) {
        $this->dao->atualizarBebida($nomeOriginal, $nome, $categoria, $volume, $valor, $qtde);
    }
}