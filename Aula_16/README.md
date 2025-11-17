Projeto MVC em PHP - Estrutura simples (pronto para VS Code)

Estrutura:
- public/index.php    -> Front controller (acesso pelo navegador, ex: http://localhost:8000)
- src/Controller/BebidaController.php
- src/Model/Bebida.php
- src/Model/BebidaDAO.php
- views/ (list.php, form.php)
- data/bebidas.json

Como rodar (PHP instalado):
1. Abra o terminal no diretório 'mvc_app'
2. Execute: php -S 0.0.0.0:8000 -t public
3. Abra no navegador: http://localhost:8000

Observações para VS Code:
- Abra a pasta mvc_app no VS Code.
- Use Live Server or o servidor embutido do PHP para testar.
- Ajuste permissões do arquivo data/bebidas.json para escrita pelo PHP se necessário.

Autor: Gabriel Dos Santos Xavier
Curso: Análise e Desenvolvimento de Sistemas
