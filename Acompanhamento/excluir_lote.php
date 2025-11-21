<?php
// Inclusão dos arquivos necessários
require_once("../Classes/Database.class.php");
include_once '../Includes/menuinclude.php'; // Incluindo o menu, se necessário
include_once '../config/config.inc.php'; // Incluindo a configuração de banco de dados

// Receber o id_lote via GET
$id_lote = $_GET['id_lote'] ?? null;

if (!$id_lote || !is_numeric($id_lote)) {
    die("ID do lote inválido ou não fornecido.");
}

// Iniciar transação para garantir integridade
Database::beginTransaction();

try {
    // Desabilitar verificações de foreign key temporariamente (perigoso, use com cuidado!)
    Database::executar("SET FOREIGN_KEY_CHECKS = 0");

    // 1. Excluir leitões associados ao lote
    $sql_delete_leitoes = "DELETE FROM leitoes WHERE id_lote = :id_lote";
    $result_leitoes = Database::executar($sql_delete_leitoes, [':id_lote' => $id_lote]);
    if ($result_leitoes === false) {
        throw new Exception("Erro ao excluir leitões.");
    }

    // 2. Excluir o lote
    $sql_delete_lote = "DELETE FROM lotes WHERE id_lote = :id_lote";
    $result_lote = Database::executar($sql_delete_lote, [':id_lote' => $id_lote]);
    if ($result_lote === false) {
        throw new Exception("Erro ao excluir lote.");
    }

    // 3. Reordenar IDs dos lotes restantes
    // Consultar lotes restantes em ordem crescente
    $sql_select_rest = "SELECT id_lote FROM lotes ORDER BY id_lote ASC";
    $rest_result = Database::consultar($sql_select_rest);
    if ($rest_result === false) {
        throw new Exception("Erro ao consultar lotes restantes.");
    }
    $rest_lotes = $rest_result->fetchAll(PDO::FETCH_ASSOC);

    // Reatribuir IDs sequenciais (1, 2, 3, ...)
    $new_id = 1;
    foreach ($rest_lotes as $rest_lote) {
        $old_id = $rest_lote['id_lote'];
        if ($old_id != $new_id) {
            // Atualizar leitões associados primeiro (para manter consistência)
            $sql_update_leitoes = "UPDATE leitoes SET id_lote = :new_id WHERE id_lote = :old_id";
            $update_leitoes_result = Database::executar($sql_update_leitoes, [':new_id' => $new_id, ':old_id' => $old_id]);
            if ($update_leitoes_result === false) {
                throw new Exception("Erro ao reordenar leitões para lote ID $old_id.");
            }

            // Depois atualizar o lote
            $sql_update_lote = "UPDATE lotes SET id_lote = :new_id WHERE id_lote = :old_id";
            $update_result = Database::executar($sql_update_lote, [':new_id' => $new_id, ':old_id' => $old_id]);
            if ($update_result === false) {
                throw new Exception("Erro ao reordenar lote ID $old_id.");
            }
        }
        $new_id++;
    }

    // Reabilitar verificações de foreign key
    Database::executar("SET FOREIGN_KEY_CHECKS = 1");

    // Commit da transação
    Database::commit();

    // Redirecionar de volta para a lista com sucesso
    header("Location: listar_lotes.php?msg=excluido");
    exit;

} catch (Exception $e) {
    // Reabilitar verificações de foreign key em caso de erro
    Database::executar("SET FOREIGN_KEY_CHECKS = 1");
    // Rollback em caso de erro
    Database::rollback();
    die("Erro durante a exclusão: " . $e->getMessage());
}
?>
