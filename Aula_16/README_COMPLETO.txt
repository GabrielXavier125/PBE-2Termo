README COMPLETO – SISTEMA PHP COM CRUD E BANCO DE DADOS (EXPLICAÇÃO DETALHADA)

Este documento foi criado para explicar todo o funcionamento do seu
projeto de forma extremamente clara, detalhada e acessível, como se
estivesse ensinando programação para alguém que nunca teve contato com
PHP, CRUD ou bancos de dados.

------------------------------------------------------------------------

✔ 1. O QUE É ESTE PROJETO?

Este é um sistema simples de cadastro de bebidas, feito em:

-   PHP (linguagem de programação backend)
-   MySQL (banco de dados relacional)
-   Estrutura MVC (Model–View–Controller)
-   Páginas PHP que permitem:
    -   cadastrar bebidas (Create)
    -   listar bebidas (Read)
    -   editar bebidas (Update)
    -   excluir bebidas (Delete)

Ou seja, um sistema CRUD completo.

------------------------------------------------------------------------

✔ 2. O QUE É CRUD?

CRUD é um acrônimo usado em praticamente qualquer sistema que trabalha
com dados.

Ele significa:

  Letra   Palavra   Significado
  ------- --------- --------------------------
  C       Create    Criar registros no banco
  R       Read      Ler / buscar dados
  U       Update    Atualizar dados
  D       Delete    Apagar dados

Seu sistema implementa os quatro.

------------------------------------------------------------------------

✔ 3. COMO O PROJETO ESTÁ ORGANIZADO?

O projeto segue um padrão chamado MVC (Model–View–Controller).

Esse padrão existe para organizar o código e evitar bagunça.

📌 MODEL

Representa a estrutura dos dados.
No seu caso: Bebida.php

Ele define: - quais atributos uma bebida possui - como esses dados são
armazenados na memória

📌 VIEW

São as páginas visíveis no navegador (HTML + PHP).
No seu projeto: - form.php (formulário) - list.php (lista de bebidas) -
edit.php (edição) - index.php (página inicial)

As views exibem dados e recebem informações digitadas pelo usuário.

📌 CONTROLLER

É o cérebro do sistema.
Controla o fluxo do programa.

Aqui: BebidaController.php

Ele decide: - qual ação executar - qual página exibir - quando salvar -
quando excluir - quando editar

📌 DAO (Data Access Object)

É responsável por acessar o banco de dados MySQL.

No seu sistema: BebidaDAO.php

O DAO: - conecta no MySQL - envia comandos SQL - recebe resultados -
converte resultados em objetos Bebida

------------------------------------------------------------------------

✔ 4. ENTENDENDO O FLUXO DO SISTEMA

Vamos imaginar que o usuário quer cadastrar uma bebida:

1️⃣ Ele abre form.php

Isso mostra um formulário com campos: nome, quantidade, preço, etc.

2️⃣ O usuário aperta o botão “Salvar”

O formulário envia os dados para o Controller usando method="POST".

3️⃣ O Controller recebe os dados

BebidaController.php verifica se a ação é "cadastrar".

4️⃣ O Controller cria um objeto “Bebida”

Esse objeto contém todos os dados digitados.

5️⃣ O Controller envia o objeto para o DAO

BebidaDAO.php executa o SQL:

    INSERT INTO bebidas (...)

6️⃣ O banco grava os dados

E devolve “OK”.

7️⃣ O usuário é redirecionado para list.php

Agora pode ver a bebida na lista.

------------------------------------------------------------------------

✔ 5. EXPLICAÇÃO DOS PRINCIPAIS ARQUIVOS

📌 1. Connection.php

Responsável pela conexão com o banco MySQL.
Usa PDO, que é seguro e moderno.

Ele possui: - host - nome do banco - usuário - senha - método
getConnection() para abrir a conexão

------------------------------------------------------------------------

📌 2. Bebida.php (MODEL)

Classe que representa uma bebida.

Define atributos como: - id - nome - preco - quantidade - marca

Cada atributo possui: - getters (pega valores) - setters (define
valores)

------------------------------------------------------------------------

📌 3. BebidaDAO.php

Aqui ficam os comandos SQL.

Ele possui funções como:

✔ create(Bebida $bebida)

Executa:

    INSERT INTO bebidas (...)

✔ read()

Executa:

    SELECT * FROM bebidas

✔ update(Bebida $bebida)

Executa:

    UPDATE bebidas SET ... WHERE id=?

✔ delete($id)

Executa:

    DELETE FROM bebidas WHERE id=?

É o coração do CRUD.

------------------------------------------------------------------------

📌 4. BebidaController.php

Faz a ponte entre os formulários (View) e o banco (DAO).

Verifica qual ação o usuário pediu:

✔ Cadastrar

✔ Editar

✔ Excluir

✔ Carregar item para edição

Depois chama o DAO para executar a ação.

------------------------------------------------------------------------

📌 5. form.php (VIEW)

Tela que exibe o formulário de cadastro.

Possui campos de: - nome - preço - marca - quantidade

Envia para:

    BebidaController.php?action=cadastrar

------------------------------------------------------------------------

📌 6. list.php (VIEW)

Exibe todas as bebidas cadastradas.

Mostra tabela e botões como:

-   Editar
-   Excluir

Chama o controller usando URLs como:

    BebidaController.php?action=delete&id=5

------------------------------------------------------------------------

📌 7. edit.php (VIEW)

Formulário semelhante ao de cadastro, mas já preenchido com dados.

Envia para:

    BebidaController.php?action=update

------------------------------------------------------------------------

✔ 6. COMO OS ARQUIVOS SE CONVERSAM?

Fluxo completo:

    VIEW (form.php)
        ↓ envia dados
    CONTROLLER (BebidaController.php)
        ↓ cria objeto Bebida
    DAO (BebidaDAO.php)
        ↓ envia SQL
    DATABASE (MySQL)
        ↓ devolve resultado
    VIEW (list.php)

------------------------------------------------------------------------

✔ 7. BANCO DE DADOS

Seu MySQL possui uma tabela mais ou menos assim:

    CREATE TABLE bebidas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255),
        marca VARCHAR(255),
        quantidade INT,
        preco DECIMAL(10,2)
    );

------------------------------------------------------------------------

✔ 8. O QUE VOCÊ APRENDE COM ESTE PROJETO

Você está trabalhando com:

✔ Programação orientada a objetos (POO)

✔ MVC

✔ CRUD completo

✔ Conexão segura com PDO

✔ Manipulação de formulários

✔ SQL real em produção

✔ Requisições GET e POST

✔ Estrutura profissional de sistemas PHP

Este projeto é literalmente o que empresas usam em sistemas reais.

------------------------------------------------------------------------

✔ 9. COMO EXECUTAR O PROJETO

1.  Baixe o projeto
2.  Coloque na pasta do XAMPP/htdocs
3.  Inicie MySQL e Apache
4.  Crie o banco e tabela
5.  Abra no navegador:

    http://localhost/Aula_16

------------------------------------------------------------------------

✔ 10. CONCLUSÃO

Este projeto é um ótimo exemplo real de MVC + CRUD, com todas as camadas
que um sistema profissional usa.

Ele te ensina:

-   separar responsabilidades
-   trabalhar com classes
-   organizar código
-   pensar como um programador profissional

Este README serve como um guia definitivo para entender toda a lógica
interna do seu sistema.

Se quiser, posso gerar: - diagrama ER - diagrama UML - fluxograma
completo do CRUD - versão em PDF/Word

Só pedir!
