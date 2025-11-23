<?php
include "../config/config.inc.php";
include "../Classes/Database.class.php";

// ------------------------------
// Função de debug opcional
// ------------------------------
function debug_log($msg) {
    error_log("[DEBUG] " . $msg);
}

// ------------------------------
// 1. Recebe dados do lote
// ------------------------------
$porca = $_POST['porca'] ?? '';
$lote = $_POST['lote'] ?? '';
$vivos = is_numeric($_POST['vivos'] ?? null) ? (int)$_POST['vivos'] : 0;
$mortos = is_numeric($_POST['mortos'] ?? null) ? (int)$_POST['mortos'] : 0;
$mumia = is_numeric($_POST['mumia'] ?? null) ? (int)$_POST['mumia'] : 0;

$tmaternidade = $_POST['tmaternidade'] ?: null;
$parto_lote = $_POST['parto_lote'] ?: null;
$desmame_lote = $_POST['desmame_lote'] ?: null;
$screche_lote = $_POST['screche_lote'] ?: null;
$venda_lote = $_POST['venda_lote'] ?: null;

$id_lote = isset($_POST['id_lote']) && is_numeric($_POST['id_lote']) ? (int)$_POST['id_lote'] : null;

debug_log("ID recebido: $id_lote");

// ------------------------------
// 2. Salva ou atualiza o LOTE
// ------------------------------
if ($id_lote === null) {
    // Criar novo lote
    $sql = "INSERT INTO lotes 
            (porca, lote, vivos, mortos, mumia, tmaternidade, parto_lote, desmame_lote, screche_lote, venda_lote)
            VALUES 
            (:porca, :lote, :vivos, :mortos, :mumia, :tmaternidade, :parto_lote, :desmame_lote, :screche_lote, :venda_lote)";

    $ok = Database::executar($sql, [
        ':porca' => $porca,
        ':lote' => $lote,
        ':vivos' => $vivos,
        ':mortos' => $mortos,
        ':mumia' => $mumia,
        ':tmaternidade' => $tmaternidade,
        ':parto_lote' => $parto_lote,
        ':desmame_lote' => $desmame_lote,
        ':screche_lote' => $screche_lote,
        ':venda_lote' => $venda_lote
    ]);

    if (!$ok) {
        die("❌ Erro ao inserir lote: " . Database::getLastError());
    }

    $id_lote = Database::lastInsertId();
    if (!$id_lote) {
        die("❌ Erro ao obter id_lote após inserção!");
    }

    debug_log("Novo lote criado: $id_lote");

} else {
    // Atualizar lote existente
    $sql = "UPDATE lotes SET
            porca = :porca,
            lote = :lote,
            vivos = :vivos,
            mortos = :mortos,
            mumia = :mumia,
            tmaternidade = :tmaternidade,
            parto_lote = :parto_lote,
            desmame_lote = :desmame_lote,
            screche_lote = :screche_lote,
            venda_lote = :venda_lote
            WHERE id_lote = :id_lote";

    $ok = Database::executar($sql, [
        ':porca' => $porca,
        ':lote' => $lote,
        ':vivos' => $vivos,
        ':mortos' => $mortos,
        ':mumia' => $mumia,
        ':tmaternidade' => $tmaternidade,
        ':parto_lote' => $parto_lote,
        ':desmame_lote' => $desmame_lote,
        ':screche_lote' => $screche_lote,
        ':venda_lote' => $venda_lote,
        ':id_lote' => $id_lote
    ]);

    if (!$ok) {
        die("❌ Erro ao atualizar lote: " . Database::getLastError());
    }

    debug_log("Lote atualizado: $id_lote");
}

// ------------------------------
// 3. Salva os LEITÕES
// ------------------------------
$leitoes = $_POST['mossa'] ?? [];

if (!empty($leitoes)) {
    foreach ($leitoes as $i => $mossa) {

        if (empty(trim($mossa))) continue;

        $sexo = $_POST['sexo'][$i] ?? null;
        $observacao = $_POST['observacao'][$i] ?? null;

        $nascimento = $_POST['nascimento'][$i] ?: null;
        $desmame_animal = $_POST['desmame_animal'][$i] ?: null;
        $screche_animal = $_POST['screche_animal'][$i] ?: null;
        $venda_animal = $_POST['venda_animal'][$i] ?: null;

        $sql_leitao = "INSERT INTO leitoes 
                        (id_lote, mossa, sexo, observacao, nascimento, desmame_animal, screche_animal, venda_animal)
                       VALUES 
                        (:id_lote, :mossa, :sexo, :observacao, :nascimento, :desmame_animal, :screche_animal, :venda_animal)";

        $ok = Database::executar($sql_leitao, [
            ':id_lote' => $id_lote,
            ':mossa' => $mossa,
            ':sexo' => $sexo,
            ':observacao' => $observacao,
            ':nascimento' => $nascimento,
            ':desmame_animal' => $desmame_animal,
            ':screche_animal' => $screche_animal,
            ':venda_animal' => $venda_animal
        ]);

        if (!$ok) {
            die("❌ Erro ao inserir leitão ($i): " . Database::getLastError());
        }
    }

    debug_log("Leitões salvos.");
} else {
    debug_log("Nenhum leitão enviado.");
}

// ------------------------------
// 4. Redireciona corretamente
// ------------------------------
header("Location: visualizar_lote.php?id_lote=$id_lote");
exit;
?>
