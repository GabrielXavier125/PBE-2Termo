README COMPLETO – SISTEMA DE CADASTRO E GERENCIAMENTO
DE LIVROS DA BIBLIOTECA ESCOLAR (MVC + PHP + MySQL + PDO)

Este documento foi criado para explicar, de forma clara e detalhada, como funciona
o SEU sistema de biblioteca escolar, baseado no projeto anterior (Aula_16) e
adaptado para o contexto de livros.

A ideia é que até alguém que nunca viu programação PHP, orientação a objetos,
MVC ou CRUD consiga ler este arquivo e entender o que está acontecendo.


======================================================================
1. VISÃO GERAL DO PROJETO
======================================================================

O que este sistema faz?

Ele é um pequeno sistema web que permite gerenciar o catálogo de livros de uma
biblioteca escolar. Com ele é possível:

- Cadastrar livros (Create)
- Listar livros (Read)
- Editar livros (Update)
- Excluir livros (Delete)

Ou seja, ele implementa um CRUD completo para a entidade "Livro".

As principais tecnologias usadas são:

- PHP 7/8 (backend)
- Programação Orientada a Objetos (POO)
- Arquitetura MVC (Model-View-Controller)
- MySQL como banco de dados relacional
- PDO para conexão segura com o MySQL
- HTML + CSS para interface visual (design igual ao projeto anterior)

Estrutura de pastas (resumida):

- public/
    - index.php        → ponto de entrada da aplicação (roteador simples)
    - style.css        → folha de estilo (mesmo design do projeto anterior)
- src/
    - Model/
        - Connection.php → conexão PDO com MySQL
        - Livro.php      → classe que representa um livro (Model)
        - LivroDAO.php   → classe que fala com o banco (DAO)
    - Controller/
        - LivroController.php → coordena as ações (Controller)
- views/
    - list.php         → tela de listagem dos livros
    - form.php         → tela de cadastro de novo livro
    - edit.php         → tela de edição de livro existente


======================================================================
2. FUNCIONAMENTO DO PHP COM ORIENTAÇÃO A OBJETOS
======================================================================

No seu projeto, PHP não é usado apenas como um "HTML com comandos soltos".
Ele é usado no modo Orientado a Objetos (POO).

POO significa organizar o código em:

- Classes
- Objetos
- Atributos
- Métodos

Em vez de você ter um monte de variáveis soltas no código, você cria uma
“forma” (classe) e, a partir dela, cria objetos concretos.

Exemplo: classe Livro

- Arquivo: src/Model/Livro.php
- Essa classe tem atributos:
  - id
  - titulo
  - autor
  - ano
  - genero
  - quantidade

Ela também tem métodos:

- __construct() → método construtor que recebe os dados do livro
- getters (getTitulo, getAutor, getAno, etc.)
- setters (setTitulo, setAutor, setAno, etc.)

Quando o usuário preenche o formulário e clica em Salvar, o Controller cria um
OBJETO da classe Livro, por exemplo:

  $livro = new Livro($titulo, $autor, $ano, $genero, $quantidade);

Esse objeto representa um livro real da biblioteca, mas dentro da memória
do PHP.

Depois, esse objeto é enviado para a camada DAO para ser salvo no banco.

Vantagens da Orientação a Objetos:

- Organização: cada coisa do sistema vira uma classe (Livro, DAO, Controller…).
- Reutilização: você pode criar vários objetos Livro usando a mesma classe.
- Manutenção: fica mais fácil entender e modificar o código.
- Escalabilidade: se amanhã você quiser adicionar mais campos (ex: editora),
  basta alterar a classe e o banco.


======================================================================
3. PERSISTÊNCIA DE DADOS COM MYSQL E PDO
======================================================================

Persistência de dados significa: “gravar os dados de forma que eles não
se percam quando você fecha o sistema”.

No seu projeto, isso é feito com:

- MySQL → banco de dados onde os livros são armazenados.
- PDO → biblioteca do PHP que gerencia a conexão com o banco.

Arquivo responsável: src/Model/Connection.php

O que ele faz:

1) Cria uma conexão com o servidor MySQL (host, usuário, senha).
2) Cria o banco de dados “biblioteca” se ele ainda não existir.
3) Seleciona o banco “biblioteca”.
4) Retorna uma instância de PDO pronta para ser usada em outros arquivos.

A classe Connection funciona como um “centralizador de conexão”.

Outros arquivos, como LivroDAO.php, usam:

  $this->conn = Connection::getInstance();

Assim, todo o sistema usa a MESMA conexão, configurada em um único lugar.


======================================================================
4. ROTINAS CRUD (CREATE, READ, UPDATE, DELETE)
======================================================================

CRUD é a base de praticamente todo sistema que trabalha com cadastro.

No seu projeto, o CRUD de livros é implementado principalmente em:

- LivroDAO.php  → fala com o banco (SQL)
- LivroController.php → decide o que fazer (lógica de aplicação)
- views/*.php   → exibem os dados (interface)

Métodos obrigatórios na DAO e o que eles fazem:

1) criarLivro(Livro $livro) → CREATE
   - Monta um comando SQL INSERT.
   - Usa os dados do objeto Livro (titulo, autor, ano, genero, quantidade).
   - Envia para o banco usando PDO com bind de parâmetros.

2) lerLivros() → READ
   - Executa um SELECT * FROM livros ORDER BY titulo.
   - Para cada linha retornada, cria um objeto Livro.
   - Devolve uma lista (array) de objetos Livro para o Controller.

3) atualizarLivro($tituloOriginal, Livro $livroAtualizado) → UPDATE
   - Monta um UPDATE livros SET … WHERE titulo=:tituloOriginal.
   - Usa o título antigo para localizar o registro original.
   - Atualiza os demais campos com os dados do objeto Livro atualizado.

4) excluirLivro($titulo) → DELETE
   - Executa DELETE FROM livros WHERE titulo=:titulo.
   - Remove o registro do banco de dados.

5) buscarPorTitulo($titulo)
   - Executa SELECT * FROM livros WHERE titulo=:titulo.
   - Se encontrar, monta e retorna um objeto Livro.
   - Se não encontrar, retorna null.


======================================================================
5. CLASSES, MÉTODOS E INTERAÇÕES ENTRE CAMADAS
======================================================================

Principais classes do sistema:

1) Livro (Model)
   - Representa um livro.
   - Guarda os dados em atributos.
   - Oferece métodos de acesso (get/set).

2) LivroDAO (Data Access Object)
   - É a camada que conversa diretamente com o banco.
   - Contém métodos que transformam ações em comandos SQL.
   - Exemplos: criarLivro, lerLivros, atualizarLivro, excluirLivro, buscarPorTitulo.

3) LivroController (Controller)
   - É a camada que recebe a intenção do usuário.
   - Lê os dados da requisição (GET/POST).
   - Cria objetos Livro.
   - Chama os métodos do DAO.
   - Escolhe qual View será exibida.

4) Connection
   - Responsável por criar/gerenciar a conexão PDO com o MySQL.

5) Views (list.php, form.php, edit.php)
   - São os arquivos que mostram as telas HTML.
   - Podem exibir formulários, tabelas, mensagens, etc.
   - Recebem dados do Controller (por exemplo, a lista de livros).

Fluxo típico de interação:

Usuário → View → Controller → DAO → Banco de Dados
Banco de Dados → DAO → Controller → View → Usuário


======================================================================
6. BANCO DE DADOS E CRIAÇÃO DE TABELAS
======================================================================

O banco de dados usado é o MySQL.

No Connection.php, o sistema já garante:

- Criação do banco “biblioteca” (caso não exista).
- Seleção desse banco para uso.

No LivroDAO.php, o construtor garante a existência da tabela “livros”:

CREATE TABLE IF NOT EXISTS livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL UNIQUE,
    autor VARCHAR(150) NOT NULL,
    ano INT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL
);

Campos:

- id → identificador único (chave primária)
- titulo → título do livro (único, para facilitar a atualização/exclusão)
- autor → nome do autor
- ano → ano de publicação
- genero → gênero literário (romance, fantasia, etc.)
- quantidade → quantidade de exemplares disponíveis


======================================================================
7. FORMULÁRIOS E TRATAMENTO DE REQUISIÇÕES
======================================================================

O usuário interage com o sistema principalmente por meio de formulários HTML.

Principais telas:

1) list.php
   - Mostra a tabela com todos os livros.
   - Tem um botão “+ Cadastrar novo livro”.
   - Tem botões de “Editar” e “Excluir”.

2) form.php
   - Mostra o formulário para cadastrar novo livro.
   - Campos: título, autor, ano, gênero, quantidade.
   - Quando o usuário clica em “Salvar”, o formulário envia:
     - method="post"
     - action="index.php"
     - um campo oculto: action="create"

3) edit.php
   - Mostra o formulário com os dados de um livro já cadastrado.
   - Permite alterar os campos.
   - Envia:
     - method="post"
     - action="index.php"
     - action="update"
     - campo oculto tituloOriginal (título antigo, usado no WHERE do UPDATE)

Tratamento das requisições:

No arquivo public/index.php:

- Lê o parâmetro action (via GET ou POST):
  - $action = $_REQUEST['action'] ?? 'index';

- Se for requisição POST:
  - create → chama $controller->create(...)
  - update → chama $controller->update(...)
  - delete → chama $controller->delete(...)

- Depois de executar o CRUD:
  - Faz um redirecionamento:
    header('Location: index.php');
    exit;

Isso evita reenvio de formulário e mantém o CSS funcionando, pois o usuário
volta sempre para o mesmo arquivo index.php dentro da pasta public.


======================================================================
8. COMO FUNCIONA CADA CAMADA DO MVC
======================================================================

MVC significa Model-View-Controller.

No seu sistema:

MODEL
- Representa os dados e as regras de negócio.
- Arquivos:
  - Livro.php → define o que é um livro.
  - LivroDAO.php → sabe como gravar/buscar livros no banco.
  - Connection.php → cuida da conexão com o banco.

VIEW
- Responsável pela interface com o usuário (HTML + CSS).
- Arquivos:
  - views/list.php → lista todos os livros.
  - views/form.php → exibe o formulário de cadastro.
  - views/edit.php → exibe o formulário de edição.

CONTROLLER
- Faz a ligação entre o que o usuário quer e o que o sistema faz.
- Arquivo:
  - src/Controller/LivroController.php

PONTO DE ENTRADA / ROTEADOR
- public/index.php
  - Lê o parâmetro action.
  - Chama os métodos do LivroController.
  - Inclui a View correspondente.

Resumo simplificado:

- Model → “O QUE” o sistema manipula (Livro, dados, regras).
- View → “COMO” isso é mostrado.
- Controller → “O QUE FAZER AGORA”, baseado na ação do usuário.


======================================================================
9. FUNCIONAMENTO GERAL DA APLICAÇÃO (FLUXO COMPLETO)
======================================================================

Vamos imaginar o ciclo completo de uso do sistema.

1) Usuário entra na URL:
   http://localhost/SuaPasta/public/index.php

2) O arquivo index.php:
   - Cria uma instância de LivroController.
   - Ação padrão = 'index'.
   - Chama $controller->index(), que chama LivroDAO->lerLivros().
   - Recebe a lista de livros.
   - Inclui views/list.php, passando a lista.

3) Usuário clica em “+ Cadastrar novo livro”:
   - Navegador chama:
     index.php?action=form
   - O index inclui views/form.php.
   - O usuário preenche o formulário.

4) Ao clicar em “Salvar”:
   - O formulário envia um POST para index.php.
   - action="create".
   - public/index.php detecta:
     - método POST
     - action = create
   - Chama:
     $controller->create($titulo, $autor, $ano, $genero, $quantidade)
   - O Controller cria um objeto Livro e passa para LivroDAO->criarLivro().
   - O DAO grava o registro no banco (INSERT).
   - O index.php redireciona de volta para index.php (lista).

5) Usuário vê o novo livro na tabela (READ).

6) Para editar:
   - Clica no botão “Editar” → link com:
     index.php?action=edit&titulo=AlgumTitulo
   - public/index.php inclui views/edit.php.
   - edit.php usa LivroDAO->buscarPorTitulo($titulo) para preencher o formulário.
   - Usuário altera os dados e clica em “Salvar alterações”.
   - O POST vai para index.php com:
     - action="update"
     - tituloOriginal + novos dados
   - Controller chama LivroDAO->atualizarLivro(...).
   - Após o UPDATE, redireciona para index.php.

7) Para excluir:
   - Na listagem, o botão “Excluir” envia um formulário POST:
     - action="delete"
     - titulo do livro
   - public/index.php trata delete e chama:
     $controller->delete($titulo);
   - LivroDAO->excluirLivro($titulo) faz o DELETE no banco.
   - Redireciona para index.php novamente.


======================================================================
10. O QUE VOCÊ APRENDE NA PRÁTICA COM ESTE PROJETO
======================================================================

Trabalhando com este sistema, você pratica:

- PHP orientado a objetos:
  - classes, atributos, métodos, construtor, getters e setters.

- Arquitetura MVC:
  - separação entre Model, View e Controller.
  - organização típica de sistemas profissionais.

- Persistência com MySQL e PDO:
  - conexão centralizada.
  - criação de banco e tabela.
  - comandos SQL (INSERT, SELECT, UPDATE, DELETE).
  - prepared statements e bind de parâmetros.

- Rotinas CRUD:
  - criarLivro, lerLivros, atualizarLivro, excluirLivro, buscarPorTitulo.

- Interação entre camadas:
  - View envia dados para Controller.
  - Controller monta objetos Model.
  - Controller chama métodos do DAO.
  - DAO conversa com o Banco de Dados.
  - DAO devolve resultados para o Controller.
  - Controller envia dados para View.

- Formulários e requisições HTTP:
  - uso de method="post" e action="index.php".
  - uso de parâmetros GET/POST via $_REQUEST, $_GET, $_POST.

- Redirecionamento e UX:
  - uso de header('Location: index.php'); para evitar reenvio de formulário
    e manter o CSS funcionando corretamente.

Este é um projeto com cara de “trabalho de escola/faculdade”, mas com
estrutura muito semelhante ao que se vê em sistemas reais de empresas.

Guarde este projeto com carinho: ele é um verdadeiro laboratório de
conceitos fundamentais de desenvolvimento web com PHP.


======================================================================
FIM DO DOCUMENTO
======================================================================

Se você quiser, podemos transformar este conteúdo em um PDF bem formatado,
ou em um arquivo .docx com capa, sumário e seções bonitinhas para entregar
como documentação do sistema.