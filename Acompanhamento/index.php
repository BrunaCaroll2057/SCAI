<?php
session_start();

require_once("../Classes/Database.class.php");

// Corrige includes com caminho relativo
if (file_exists(__DIR__ . '/../Includes/menuinclude.php')) {
    include __DIR__ . '/../Includes/menuinclude.php';
}
if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
    $temRodape = true;
} else {
    $temRodape = false;
}

$id_lote = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/form_suino.css">

</head>
<body>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <?php include __DIR__ . '/form_cad_suino.php'; ?>
    </form>

<script>
    let leitoesCount = 1;

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

<?php if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php'; ?>


</body>
</html>
