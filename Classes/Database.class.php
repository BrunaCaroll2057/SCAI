<?php
include "../config/config.inc.php"; 

class Database {
    private static $conexao = null; // Mantém a conexão persistente

    private static function abrirConexao() {
        if (self::$conexao === null) {
            try {
                self::$conexao = new PDO(DSN, USUARIO, SENHA);
            } catch (PDOException $e) {
                echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
                return null;
            }
        }
        return self::$conexao;
    }

    private static function preparar($sql) {
        $conexao = self::abrirConexao();
        if ($conexao) {
            try {
                return $conexao->prepare($sql);
            } catch (PDOException $e) {
                self::setLastError("Erro ao preparar query: " . $e->getMessage());
                return null;
            }
        }
        self::setLastError("Sem conexão com o banco de dados.");
        return null;
}


    private static function vincularParametros($comando, $parametros) {
        foreach ($parametros as $chave => $valor) {
            $comando->bindValue($chave, $valor);
        }
        return $comando;
    }

    public static function executar($sql, $parametros = []) {
        try {
            $comando = self::preparar($sql);
            if (!$comando) throw new Exception("Erro ao preparar a query.");
            $comando = self::vincularParametros($comando, $parametros);
            $comando->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao executar query: " . $e->getMessage();
            return false;
        }
    }

    public static function consultar($sql, $parametros = []) {
        try {
            $comando = self::preparar($sql);
            if (!$comando) {
                return false;
            }

            $comando = self::vincularParametros($comando, $parametros);

            $comando->execute();
            return $comando;

        } catch (PDOException $e) {
            self::setLastError("Erro ao executar consulta: " . $e->getMessage());
            return false;
        }
    }
    public static function lastInsertId() {
        $conexao = self::abrirConexao();
        if ($conexao) {
            return $conexao->lastInsertId();
        }
        return null;
    }

    public static function beginTransaction() {
        $conexao = self::abrirConexao();
        if ($conexao) {
            $conexao->beginTransaction();
        }
    }

    public static function commit() {
        $conexao = self::abrirConexao();
        if ($conexao) {
            $conexao->commit();
        }
    }

    public static function rollback() {
        $conexao = self::abrirConexao();
        if ($conexao) {
            $conexao->rollBack();
        }
    }
    private static $lastError = null;

    private static function setLastError($error) {
        self::$lastError = $error;
    }

    public static function getLastError() {
        return self::$lastError;
    }

}
?>