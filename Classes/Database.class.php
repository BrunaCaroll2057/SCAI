<?php
include "../config/config.inc.php"; 

class Database {
    private static function abrirConexao() {
        try {
            return new PDO(DSN, USUARIO, SENHA);
        } catch (PDOException $e) {
            echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
            return null;
        }
    }

    private static function preparar($sql) {
        $conexao = self::abrirConexao();
        if ($conexao) {
            return $conexao->prepare($sql);
        }
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
        return true; // Para INSERT, UPDATE, DELETE
    } catch (PDOException $e) {
        echo "Erro ao executar query: " . $e->getMessage();
        return false;
    }
}

public static function consultar($sql, $parametros = []) {
    try {
        $comando = self::preparar($sql);
        if (!$comando) throw new Exception("Erro ao preparar a query.");
        $comando = self::vincularParametros($comando, $parametros);
        $comando->execute();
        return $comando; // Retorna o PDOStatement
    } catch (PDOException $e) {
        echo "Erro ao executar query: " . $e->getMessage();
        return false;
    }
}
}
?>h