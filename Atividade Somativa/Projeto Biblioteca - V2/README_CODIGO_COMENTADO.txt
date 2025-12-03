README – EXPLICAÇÃO COMPLETA DO SISTEMA DA BIBLIOTECA (VERSÃO ATUALIZADA)

Agora com tratamento de erros de título duplicado e sem redirecionamento!

======================================================================
1. O QUE O SISTEMA FAZ
======================================================================

O sistema controla um catálogo de livros da biblioteca escolar.

Permite:
- Cadastrar livros
- Listar livros
- Editar livros
- Excluir livros

🏆 DIFERENCIAL AGORA:
Se tentar cadastrar um livro com título repetido:
❗ Não redireciona
❗ Não dá erro na página
❗ Mostra mensagem local no formulário
❗ Mantém os campos preenchidos
❗ Mensagem exibida:

"Não é possivel criar o livro, pois já possui o outro com o mesmo nome."

======================================================================
2. ARQUITETURA MVC
======================================================================

MODEL  → representa dados e acesso ao banco
VIEW   → páginas de interface
CONTROLLER → lógica da aplicação

======================================================================
3. TRATAMENTO DE TÍTULO DUPLICADO
======================================================================

Agora:

- O LivroController::create retorna true ou false
- O LivroDAO::criarLivro captura erro de UNIQUE
- Não há redirect na falha
- A mensagem de erro aparece dentro de form.php

Exemplo:

❗Erro:
Livro já existe

Fluxo:
Sistema permanece em form.php
Mantém campos preenchidos automaticamente

======================================================================
4. MODIFICAÇÕES REALIZADAS NO CÓDIGO
======================================================================

✔ ALTERADO: src/Model/LivroDAO.php

Agora o método criarLivro:

- usa try/catch
- captura erro SQLSTATE 23000
- retorna false quando título duplicado
- não lança erro fatal

Código atualizado:

return true  → inseriu
return false → título existente

───────────────────────────────────────────

✔ ALTERADO: src/Controller/LivroController.php

Agora create() retorna boolean:
- true → cadastro permitido
- false → título duplicado

───────────────────────────────────────────

✔ ALTERADO: public/index.php

Agora:

Se create retornar false:
❗ NÃO redireciona
❗ Carrega novamente form.php
❗ Preenche variáveis com valores enviados
❗ Mostra mensagem de erro

───────────────────────────────────────────

✔ ALTERADO: views/form.php

Agora exibe mensagem de erro:

<div class="alerta">
Não é possivel criar o livro, pois já possui o outro com o mesmo nome.
</div>

E exibe valores:

value="<?= htmlspecialchars($titulo) ?>"

======================================================================
5. MENSAGENS DE FEEDBACK
======================================================================

Tipo de feedbacks e comportamento:

✔ SUCESSO → Lista de livros
✔ ERRO DE DUPLICADO → permanece no formulário
✔ CAMPOS PREENCHIDOS → preservados automaticamente

======================================================================
6. COMPORTAMENTO FINAL DO SISTEMA
======================================================================

Quando cria livro com nome único:
✔ cadastra
✔ volta para lista
✔ mostra mensagem verde:
"📗 Livro adicionado com sucesso!"

Quando cria livro com nome duplicado:
✔ não cadastra
✔ permanece no formulário
✔ mostra mensagem vermelha:
"Não é possivel criar o livro, pois já possui o outro com o mesmo nome."

======================================================================
7. COMO TESTAR
======================================================================

1) Abra http://localhost/xxxx/public/
2) Vá em "+ cadastrar livro"
3) Crie:
   Título: Matrix
4) Salvar
5) Crie novamente:
   Título: Matrix
Resultado esperado:
❗ Mensagem de erro no formulário
❗ Não redireciona

======================================================================
8. CONCLUSÃO
======================================================================

Você agora tem:
✔ Sistema robusto com MVC
✔ Cadastro com verificação de duplicidade
✔ Feedback correto no lugar certo
✔ Comportamento amigável ao usuário
✔ Campos mantidos na falha

Este sistema já está nível profissional.

======================================================================
FIM DO DOCUMENTO
======================================================================
