<?php
/**
 * Classe Connection
 *
 * Responsável por criar e reutilizar uma conexão PDO com o MySQL.
 * Implementa o padrão Singleton: apenas uma instância de conexão
 * será criada e reaproveitada ao longo de toda a aplicação.
 */
class Connection {
    // Guarda a instância única de PDO.
    private static $instance = null;

    /**
     * Método estático getInstance()
     *
     * Se ainda não existir uma conexão, cria uma nova.
     * Caso contrário, devolve a mesma instância já criada.
     */
    public static function getInstance() {
        // Verifica se ainda não temos uma conexão criada.
        if (!self::$instance) {
            try {
                // Dados de acesso ao servidor MySQL.
                $host = 'localhost';      // Servidor onde o MySQL está rodando.
                $dbname = 'biblioteca';   // Nome do banco de dados que vamos usar.
                $user = 'root';           // Usuário do MySQL.
                $pass = 'senaisp';        // Senha do MySQL (ajuste se for diferente).

                // Cria um novo objeto PDO apontando apenas para o servidor (sem banco ainda),
                // definindo charset UTF-8 para suportar acentuação corretamente.
                self::$instance = new PDO(
                    "mysql:host=$host;charset=utf8mb4",
                    $user,
                    $pass
                );

                // Configura o PDO para lançar exceções em caso de erro.
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Cria o banco de dados "biblioteca" se ele ainda não existir.
                self::$instance->exec(
                    "CREATE DATABASE IF NOT EXISTS `$dbname` " .
                    "CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
                );

                // Seleciona o banco de dados que será utilizado nas próximas operações.
                self::$instance->exec("USE `$dbname`");

            } catch (PDOException $e) {
                // Em caso de erro ao conectar, exibimos uma mensagem e encerramos a execução.
                die('Erro ao conectar ao MySQL: ' . $e->getMessage());
            }
        }

        // Retorna a instância (nova ou já existente).
        return self::$instance;
    }
}
// Fecha a tag PHP.
?>
