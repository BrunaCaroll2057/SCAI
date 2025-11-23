<?php
require_once("../Classes/Database.class.php");
include_once '../Includes/menuinclude.php'; 
include_once '../config/config.inc.php'; 

$id_lote = $_GET['id_lote'] ?? null;

if (!$id_lote || !is_numeric($id_lote)) {
    die("ID do lote inválido ou não fornecido.");
}

$sql_lote = "SELECT * FROM lotes WHERE id_lote = :id_lote";
$lote_result = Database::consultar($sql_lote, [':id_lote' => $id_lote]);

if ($lote_result === false) {
    die("Erro na consulta do lote: " . Database::getLastError());
}

$lote = $lote_result->fetch(PDO::FETCH_ASSOC);

if (!$lote) {
    die("Lote não encontrado.");
}

$sql_leitoes = "SELECT * FROM leitoes WHERE id_lote = :id_lote";
$leitoes_result = Database::consultar($sql_leitoes, [':id_lote' => $id_lote]);

if ($leitoes_result === false) {
    die("Erro na consulta dos leitões: " . Database::getLastError());
}

$leitoes = $leitoes_result->fetchAll(PDO::FETCH_ASSOC);

// Processar o formulário de edição se enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualizar dados do lote
    $porca = $_POST['porca'] ?? '';
    $lote_num = $_POST['lote'] ?? '';
    $vivos = $_POST['vivos'] ?? 0;
    $mortos = $_POST['mortos'] ?? 0;
    $mumia = $_POST['mumia'] ?? 0;
    $tmaternidade = $_POST['tmaternidade'] ?? null;
    $parto_lote = $_POST['parto_lote'] ?? null;
    $desmame_lote = $_POST['desmame_lote'] ?? null;
    $screche_lote = $_POST['screche_lote'] ?? null;
    $venda_lote = $_POST['venda_lote'] ?? null;

    $sql_update_lote = "UPDATE lotes SET porca = :porca, lote = :lote, vivos = :vivos, mortos = :mortos, mumia = :mumia, tmaternidade = :tmaternidade, parto_lote = :parto_lote, desmame_lote = :desmame_lote, screche_lote = :screche_lote, venda_lote = :venda_lote WHERE id_lote = :id_lote";
    $params_lote = [
        ':porca' => $porca,
        ':lote' => $lote_num,
        ':vivos' => $vivos,
        ':mortos' => $mortos,
        ':mumia' => $mumia,
        ':tmaternidade' => $tmaternidade,
        ':parto_lote' => $parto_lote,
        ':desmame_lote' => $desmame_lote,
        ':screche_lote' => $screche_lote,
        ':venda_lote' => $venda_lote,
        ':id_lote' => $id_lote
    ];

    if (!Database::executar($sql_update_lote, $params_lote)) {
        die("Erro ao atualizar lote: " . Database::getLastError());
    }

    // Atualizar leitões existentes e adicionar novos
    if (isset($_POST['mossa'])) {
        // Primeiro, deletar todos os leitões existentes para este lote (para simplificar, recriar)
        $sql_delete_leitoes = "DELETE FROM leitoes WHERE id_lote = :id_lote";
        Database::executar($sql_delete_leitoes, [':id_lote' => $id_lote]);

        // Inserir os leitões do POST (existentes editados e novos)
        $mossas = $_POST['mossa'];
        $sexos = $_POST['sexo'];
        $observacoes = $_POST['observacao'];
        $nascimentos = $_POST['nascimento'];
        $desmames = $_POST['desmame_animal'];
        $screches = $_POST['screche_animal'];
        $vendas = $_POST['venda_animal'];

        for ($i = 0; $i < count($mossas); $i++) {
            if (!empty($mossas[$i])) { // Só inserir se mossa não estiver vazia
                $sql_insert_leitao = "INSERT INTO leitoes (id_lote, mossa, sexo, observacao, nascimento, desmame_animal, screche_animal, venda_animal) VALUES (:id_lote, :mossa, :sexo, :observacao, :nascimento, :desmame_animal, :screche_animal, :venda_animal)";
                $params_leitao = [
                    ':id_lote' => $id_lote,
                    ':mossa' => $mossas[$i],
                    ':sexo' => $sexos[$i],
                    ':observacao' => $observacoes[$i],
                    ':nascimento' => $nascimentos[$i] ?: null,
                    ':desmame_animal' => $desmames[$i] ?: null,
                    ':screche_animal' => $screches[$i] ?: null,
                    ':venda_animal' => $vendas[$i] ?: null
                ];

                if (!Database::executar($sql_insert_leitao, $params_leitao)) {
                    die("Erro ao inserir leitão: " . Database::getLastError());
                }
            }
        }
    }

    // Redirecionar de volta para a página de visualização após salvar
    header("Location: visualizar_lote.php?id_lote=$id_lote");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/form_suino.css">

</head>
<body class="bg-light">

<div class="container my-5">
    <h3 class="mb-3">Editar Lote e Leitões</h3>

    <!-- FORMULÁRIO COMBINADO -->
    <form id="form_completo" action="" method="POST">
        
        <!-- DADOS DO LOTE -->
        <h4 class="mb-3">Dados Gerais do Lote</h4>
        <table class="tabela-ficha">
            <tr><th class="titulo-secao" colspan="4">Dados gerais</th></tr>
            <tr>
                <td>Porca:</td><td><input type="text" name="porca" class="form-control" value="<?php echo htmlspecialchars($lote['porca']); ?>" required></td>
                <td>Lote:</td><td><input type="text" name="lote" class="form-control" value="<?php echo htmlspecialchars($lote['lote']); ?>" required></td>
            </tr>
        </table>

        <table class="tabela-ficha">
            <tr><th class="titulo-secao" colspan="6">Nascidos</th></tr>
            <tr>
                <td>Vivos:</td><td><input type="number" name="vivos" class="form-control" value="<?php echo htmlspecialchars($lote['vivos']); ?>" required></td>
                <td>Mortos:</td><td><input type="number" name="mortos" class="form-control" value="<?php echo htmlspecialchars($lote['mortos']); ?>" required></td>
                <td>Múmia:</td><td><input type="number" name="mumia" class="form-control" value="<?php echo htmlspecialchars($lote['mumia']); ?>" required></td>
            </tr>
        </table>

        <table class="tabela-ficha">
            <tr><th class="titulo-secao" colspan="6">Datas</th></tr>
            <tr>
                <td>Trans. Maternidade:</td><td><input type="date" name="tmaternidade" class="form-control" value="<?php echo htmlspecialchars($lote['tmaternidade'] ?? ''); ?>" required></td>
                <td>Parto:</td><td><input type="date" name="parto_lote" class="form-control" value="<?php echo htmlspecialchars($lote['parto_lote'] ?? ''); ?>" required></td>
                <td>Desmame:</td><td><input type="date" name="desmame_lote" class="form-control" value="<?php echo htmlspecialchars($lote['desmame_lote'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td>Saída de creche:</td><td><input type="date" name="screche_lote" class="form-control" value="<?php echo htmlspecialchars($lote['screche_lote'] ?? ''); ?>" required></td>
                <td>Venda:</td><td><input type="date" name="venda_lote" class="form-control" value="<?php echo htmlspecialchars($lote['venda_lote'] ?? ''); ?>" required></td>
            </tr>
        </table>

        <hr class="my-5">

        <!-- DADOS DOS LEITÕES -->
        <h4 class="mb-3">Dados Individuais dos Leitões</h4>
        <input type="hidden" name="id_lote" value="<?php echo htmlspecialchars($id_lote); ?>">

        <table class="tabela-ficha" id="leitoes_table">
            <thead>
                <tr>
                    <th class="titulo-secao">Nº</th>
                    <th class="titulo-secao">Mossa</th>
                    <th class="titulo-secao">Sexo</th>
                    <th class="titulo-secao">Observação</th>
                    <th class="titulo-secao">Nascimento</th>
                    <th class="titulo-secao">Desmame</th>
                    <th class="titulo-secao">Saída Creche</th>
                    <th class="titulo-secao">Venda</th>
                    <th class="titulo-secao">Ação</th>
                </tr>
            </thead>
            <tbody id="leitoes_container">
                <?php $num = 1; ?>
                <?php foreach ($leitoes as $leitao): ?>
                    <tr>
                        <td><?php echo $num++; ?></td>
                        <td><input type="text" name="mossa[]" class="form-control" value="<?php echo htmlspecialchars($leitao['mossa']); ?>"></td>
                        <td><select name="sexo[]" class="form-select">
                            <option value="Macho" <?php echo ($leitao['sexo'] == 'Macho') ? 'selected' : ''; ?>>Macho</option>
                            <option value="Fêmea" <?php echo ($leitao['sexo'] == 'Fêmea') ? 'selected' : ''; ?>>Fêmea</option>
                        </select></td>
                        <td><input type="text" name="observacao[]" class="form-control" value="<?php echo htmlspecialchars($leitao['observacao']); ?>"></td>
                        <td><input type="date" name="nascimento[]" class="form-control" value="<?php echo htmlspecialchars($leitao['nascimento'] ?? ''); ?>"></td>
                        <td><input type="date" name="desmame_animal[]" class="form-control" value="<?php echo htmlspecialchars($leitao['desmame_animal'] ?? ''); ?>"></td>
                        <td><input type="date" name="screche_animal[]" class="form-control" value="<?php echo htmlspecialchars($leitao['screche_animal'] ?? ''); ?>"></td>
                        <td><input type="date" name="venda_animal[]" class="form-control" value="<?php echo htmlspecialchars($leitao['venda_animal'] ?? ''); ?>"></td>
                        <td><button type="button" class="btn-excluir" onclick="excluirLeitao(this)">Excluir</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button type="button" class="btn btn-secondary mb-3" id="add_leitao">+ Adicionar Leitão</button>
        <button type="submit" class="btn btn-success mb-3">Salvar Alterações</button>
        <a href="visualizar_lote.php?id_lote=<?php echo $id_lote; ?>" class="btn btn-secondary">Cancelar</a>

    </form>

</div>

<script>
    let leitoesCount = <?php echo count($leitoes); ?>;

    // Função para adicionar novos leitões
    document.getElementById('add_leitao').addEventListener('click', function() {
        leitoesCount++;
        const tableBody = document.getElementById('leitoes_container');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${leitoesCount}</td>
            <td><input type="text" name="mossa[]" class="form-control"></td>
            <td><select name="sexo[]" class="form-select">
                <option value="Macho">Macho</option>
                <option value="Fêmea">Fêmea</option>
            </select></td>
            <td><input type="text" name="observacao[]" class="form-control"></td>
            <td><input type="date" name="nascimento[]" class="form-control"></td>
            <td><input type="date" name="desmame_animal[]" class="form-control"></td>
            <td><input type="date" name="screche_animal[]" class="form-control"></td>
            <td><input type="date" name="venda_animal[]" class="form-control"></td>
            <td><button type="button" class="btn-excluir" onclick="excluirLeitao(this)">Excluir</button></td>
        `;
        tableBody.appendChild(row);
    });

    // Função para excluir a linha completa do leitão
    function excluirLeitao(button) {
        const row = button.closest('tr');
        row.remove();
        atualizarNumeracao();
    }

    // Função para atualizar a numeração dos leitões
    function atualizarNumeracao() {
        const rows = document.querySelectorAll('#leitoes_container tr');
        rows.forEach((row, index) => {
            const cell = row.querySelector('td');
            cell.textContent = index + 1;
        });
        leitoesCount = rows.length;
    }
</script>

</body>
</html>