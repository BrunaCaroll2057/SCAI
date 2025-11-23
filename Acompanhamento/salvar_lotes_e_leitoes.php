<?php
include "../config/config.inc.php";
include "../Classes/Database.class.php"; 

// Recebendo os dados do formulário
$porca = $_POST['porca'] ?? '';
$lote = $_POST['lote'] ?? '';
$vivos = isset($_POST['vivos']) && is_numeric($_POST['vivos']) ? (int) $_POST['vivos'] : 0;
$mortos = isset($_POST['mortos']) && is_numeric($_POST['mortos']) ? (int) $_POST['mortos'] : 0;
$mumia = isset($_POST['mumia']) && is_numeric($_POST['mumia']) ? (int) $_POST['mumia'] : 0;
$tmaternidade = !empty($_POST['tmaternidade']) ? $_POST['tmaternidade'] : null;
$parto_lote = !empty($_POST['parto_lote']) ? $_POST['parto_lote'] : null;
$desmame_lote = !empty($_POST['desmame_lote']) ? $_POST['desmame_lote'] : null;
$screche_lote = !empty($_POST['screche_lote']) ? $_POST['screche_lote'] : null;
$venda_lote = !empty($_POST['venda_lote']) ? $_POST['venda_lote'] : null;

$id_lote = isset($_POST['id_lote']) && $_POST['id_lote'] !== '' && is_numeric($_POST['id_lote']) ? $_POST['id_lote'] : null;

// Se o id_lote for nulo, significa: criando um novo lote
if ($id_lote === null) {
    // Inserindo os dados do lote
    $sql_lote = "INSERT INTO lotes (porca, lote, vivos, mortos, mumia, tmaternidade, parto_lote, desmame_lote, screche_lote, venda_lote)
                 VALUES (:porca, :lote, :vivos, :mortos, :mumia, :tmaternidade, :parto_lote, :desmame_lote, :screche_lote, :venda_lote)";
    $parametros_lote = [
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
    ];
    
    Database::executar($sql_lote, $parametros_lote);

    // Recuperando o id_lote do último lote inserido
    $id_lote = Database::lastInsertId(); 
}

// Inserindo os leitões
$leitoes = $_POST['mossa'] ?? [];
foreach ($leitoes as $index => $mossa) {
    $sexo = $_POST['sexo'][$index] ?? '';
    $observacao = $_POST['observacao'][$index] ?? '';
    $nascimento = !empty($_POST['nascimento'][$index]) ? $_POST['nascimento'][$index] : null;
    $desmame_animal = !empty($_POST['desmame_animal'][$index]) ? $_POST['desmame_animal'][$index] : null;
    $screche_animal = !empty($_POST['screche_animal'][$index]) ? $_POST['screche_animal'][$index] : null;
    $venda_animal = !empty($_POST['venda_animal'][$index]) ? $_POST['venda_animal'][$index] : null;
    
    $sql_leitoes = "INSERT INTO leitoes (id_lote, mossa, sexo, observacao, nascimento, desmame_animal, screche_animal, venda_animal) 
                    VALUES (:id_lote, :mossa, :sexo, :observacao, :nascimento, :desmame_animal, :screche_animal, :venda_animal)";
    
    $parametros_leitoes = [
        ':id_lote' => $id_lote,
        ':mossa' => $mossa,
        ':sexo' => $sexo,
        ':observacao' => $observacao,
        ':nascimento' => $nascimento,
        ':desmame_animal' => $desmame_animal,
        ':screche_animal' => $screche_animal,
        ':venda_animal' => $venda_animal
    ];
    
    Database::executar($sql_leitoes, $parametros_leitoes);
}

// Redirecionar para uma página de visualização, passando o id_lote
header("Location: visualizar_lote.php?id_lote=" . $id_lote);
exit(); 
?>
