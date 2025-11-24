README – EXPLICAÇÃO COMPLETA DO SISTEMA DA BIBLIOTECA (CÓDIGO COMENTADO)

Este arquivo explica, em português simples, como funciona o sistema
de cadastro e gerenciamento de livros da biblioteca, agora com:

- Código fonte todo organizado em MVC (Model–View–Controller)
- Comentários linha a linha nos arquivos principais em PHP
- Mensagens de feedback (sucesso/erro) ao cadastrar, editar ou excluir livros

======================================================================
1. O QUE O SISTEMA FAZ
======================================================================

O sistema é um pequeno aplicativo web para controlar o catálogo de
livros de uma biblioteca escolar. Ele permite:

- Cadastrar livros (Create)
- Listar livros (Read)
- Editar livros (Update)
- Excluir livros (Delete)

Ou seja, é um CRUD completo da entidade Livro, acessando um banco
MySQL usando PHP + PDO.

Além disso, agora ele mostra mensagens amigáveis sempre que você:

- Adiciona um livro
- Atualiza um livro
- Remove um livro

Essas mensagens aparecem na tela de listagem e somem sozinhas
depois de alguns segundos.

======================================================================
2. ARQUITETURA GERAL (MVC)
======================================================================

O sistema segue a arquitetura MVC, separando responsabilidades:

- MODEL  (src/Model)
    Cuida dos dados e da comunicação com o banco.
    Principais arquivos:
    - Connection.php  → abre/gera a conexão PDO com o MySQL.
    - Livro.php       → classe que representa um livro.
    - LivroDAO.php    → classe que faz o CRUD na tabela "livros".

- CONTROLLER (src/Controller)
    Recebe as ações da aplicação (create, update, delete, index).
    Arquivo:
    - LivroController.php → coordena as operações entre Model e View.

- VIEW (views)
    Páginas que o usuário realmente vê no navegador:
    - list.php → mostra a lista de livros + botões de ação.
    - form.php → formulário para cadastrar novo livro.
    - edit.php → formulário para editar livro existente.

- PONTO DE ENTRADA (public)
    Arquivo principal:
    - index.php → decide qual ação executar e qual view carregar.

- ESTILOS (public)
    - style.css → deixa tudo bonito (cores, fontes, layout).

======================================================================
3. FLUXO DE FUNCIONAMENTO (RESUMO)
======================================================================

1. O navegador acessa o arquivo public/index.php.
2. index.php analisa o parâmetro "action" e o método da requisição:
   - Se for POST + action=create → cadastra livro.
   - Se for POST + action=update → edita livro.
   - Se for POST + action=delete → exclui livro.
3. Para cada uma dessas ações, o index.php chama o LivroController.
4. O LivroController usa o LivroDAO, que acessa o banco pelo PDO.
5. Depois da operação, index.php salva uma mensagem de feedback
   na sessão e redireciona de volta para index.php (GET).
6. No GET (action=index), o controller busca todos os livros.
7. index.php chama a view views/list.php, que mostra:
   - a mensagem de feedback (se houver)
   - a tabela com todos os livros
   - os botões de cadastrar, editar, excluir

======================================================================
4. EXPLICAÇÃO DOS PRINCIPAIS ARQUIVOS
======================================================================

4.1. public/index.php
---------------------

- Inicia a sessão (session_start) para poder usar variáveis de sessão.
- Inclui o LivroController.
- Cria um objeto $controller.
- Lê a ação vinda da URL: $action = $_REQUEST['action'] ?? 'index';
- Se a requisição for POST:
    - Se action=create → chama $controller->create(...) e grava
      a mensagem "Livro adicionado com sucesso!" na sessão.
    - Se action=update → chama $controller->update(...) e grava
      "Livro atualizado com sucesso!".
    - Se action=delete → chama $controller->delete(...) e grava
      "Livro removido com sucesso!".
    - Em todos os casos de POST, faz um header('Location: index.php')
      para evitar reenvio de formulário e recarrega a página inicial.

- Se não for POST (ou depois do redirecionamento):
    - Se action=index → chama $controller->index() e inclui list.php.
    - Se action=form → inclui form.php (cadastro).
    - Se action=edit → inclui edit.php (edição).
    - Se for qualquer outra coisa → retorna 404.

4.2. src/Model/Connection.php
-----------------------------

- Implementa o padrão Singleton para a conexão PDO.
- getInstance() verifica se já existe uma conexão; se não existir:
    - Conecta ao MySQL usando host, usuário e senha.
    - Configura o modo de erro para exceção.
    - Cria o banco "biblioteca" se não existir.
    - Dá um "USE biblioteca" para selecionar o banco.

4.3. src/Model/Livro.php
------------------------

- Classe que representa um livro.
- Tem propriedades: id, titulo, autor, ano, genero, quantidade.
- O construtor recebe esses dados e guarda nos atributos.
- Existem getters e setters para cada campo.

4.4. src/Model/LivroDAO.php
---------------------------

- Recebe a Connection::getInstance() no construtor.
- Cria a tabela "livros" (CREATE TABLE IF NOT EXISTS) se ainda
  não existir no banco.

- Principais métodos:
  * criarLivro(Livro $livro)
  * lerLivros()
  * atualizarLivro($tituloOriginal, Livro $livroAtualizado)
  * excluirLivro($titulo)
  * buscarPorTitulo($titulo)

4.5. src/Controller/LivroController.php
---------------------------------------

- É a ponte entre index.php (rota) e LivroDAO (banco).
- Tem um atributo $dao (instância de LivroDAO).
- index() → apenas chama $dao->lerLivros() e devolve o array.
- create(...) → monta um Livro e chama $dao->criarLivro($livro).
- update(...) → monta um Livro e chama $dao->atualizarLivro(...).
- delete($titulo) → chama $dao->excluirLivro($titulo).

4.6. views/list.php
-------------------

- Recebe a lista de livros na variável $livros (enviada pelo index.php).
- Exibe a mensagem de feedback, se existir em $_SESSION['mensagem'].
- Tem um botão "+ Cadastrar novo livro" que aponta para
  index.php?action=form.
- Monta uma tabela com os dados de cada livro.
- Em cada linha há:
    - Um formulário para excluir o livro (action=delete).
    - Um link para editar o livro (action=edit&titulo=...).

4.7. views/form.php
-------------------

- Exibe um formulário simples com campos:
    - Título
    - Autor
    - Ano
    - Gênero
    - Quantidade
- O formulário faz POST para index.php com action=create.

4.8. views/edit.php
-------------------

- Lê o parâmetro "titulo" da URL.
- Usa LivroDAO->buscarPorTitulo($titulo) para carregar o livro.
- Se não encontrar, mostra "Livro não encontrado".
- Se encontrar:
    - Exibe um formulário igual ao de cadastro,
      mas já preenchido com os dados atuais.
    - Faz POST para index.php com action=update.
    - Envia também o campo oculto "tituloOriginal" para localizar
      o registro correto no banco.

======================================================================
5. MENSAGENS DE FEEDBACK
======================================================================

- Depois de uma ação (create, update, delete) o index.php grava:
    $_SESSION['mensagem']      → texto da mensagem
    $_SESSION['mensagem_tipo'] → tipo (ex.: "sucesso", "erro")

- Em views/list.php:
    - Se existir mensagem na sessão, ela é exibida dentro de uma
      <div class="alerta"> com um visual de destaque.
    - Depois de exibir, a mensagem é removida da sessão com unset,
      para não aparecer novamente.

======================================================================
6. COMO EXECUTAR O PROJETO
======================================================================

1. Coloque a pasta do projeto em seu servidor local (XAMPP, Wamp, etc).
2. Certifique-se que o MySQL está rodando.
3. Ajuste usuário/senha do MySQL em src/Model/Connection.php, se necessário.
4. Acesse pelo navegador a pasta "public" (ex.: http://localhost/biblioteca/public).
5. No primeiro acesso, o sistema cria o banco "biblioteca" e a tabela "livros".
6. Use a interface para cadastrar, editar e excluir livros, vendo
   sempre as mensagens de feedback após cada ação.

======================================================================
7. CONCLUSÃO
======================================================================

Você agora tem um projeto:

- Em MVC
- Com PDO + MySQL
- Com CRUD completo de livros
- Com código comentado para estudo
- Com mensagens de feedback que deixam o sistema mais profissional

Esse material serve tanto para aprender, quanto para apresentar
em trabalhos de faculdade, provas e portfólio.
