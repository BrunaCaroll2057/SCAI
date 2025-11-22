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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <style>
        .form-control, .form-select {
            border: none !important;
            border-bottom: 2px solid #bfbfbf !important;
            border-radius: 0 !important;
            box-shadow: none !important;
        }
        .form-control:focus, .form-select:focus {
            border-bottom: 2px solid #0d6efd !important;
        }
        .tabela-ficha {
            width: 100%;
            border: 1px solid #bfbfbf;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .titulo-secao {
            background-color: #e9ecef;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }
        .btn-excluir {
            margin-top: 10px;
            background-color: #dc3545;
            color: white;
            border: none;
        }
    </style>
</head>
<body class="bg-light">

<div class="container my-5">
    <h3 class="mb-3">Cadastro de Lote e Leitões</h3>

    <!-- FORMULÁRIO COMBINADO -->
    <form id="form_completo" action="salvar_lotes_e_leitoes.php" method="POST">  <!-- Mudei o action aqui -->
        
        <!-- DADOS DO LOTE -->
        <h4 class="mb-3">Dados Gerais do Lote</h4>
        <table class="tabela-ficha">
            <tr><th class="titulo-secao" colspan="4">Dados gerais</th></tr>
            <tr>
                <td>Porca:</td><td><input type="text" name="porca" class="form-control" required></td>
                <td>Lote:</td><td><input type="text" name="lote" class="form-control" required></td>
            </tr>
        </table>

        <table class="tabela-ficha">
            <tr><th class="titulo-secao" colspan="6">Nascidos</th></tr>
            <tr>
                <td>Vivos:</td><td><input type="number" name="vivos" class="form-control"></td>
                <td>Mortos:</td><td><input type="number" name="mortos" class="form-control"></td>
                <td>Mumificados:</td><td><input type="number" name="mumia" class="form-control"></td>
            </tr>
        </table>

        <table class="tabela-ficha">
            <tr><th class="titulo-secao" colspan="6">Datas</th></tr>
            <tr>
                <td>Trans. Maternidade:</td><td><input type="date" name="tmaternidade" class="form-control"></td>
                <td>Parto:</td><td><input type="date" name="parto_lote" class="form-control"></td>
                <td>Desmame:</td><td><input type="date" name="desmame_lote" class="form-control"></td>
            </tr>
            <tr>
                <td>Saída de creche:</td><td><input type="date" name="screche_lote" class="form-control"></td>
                <td>Venda:</td><td><input type="date" name="venda_lote" class="form-control"></td>
            </tr>
        </table>

        <hr class="my-5">

        <!-- DADOS DOS LEITÕES -->
        <h4 class="mb-3">Dados Individuais dos Leitões</h4>
        <input type="hidden" name="id_lote" value="<?php echo htmlspecialchars($id_lote ?? ''); ?>">

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
                <tr>
                    <td>1</td>
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
                </tr>
            </tbody>
        </table>

        <button type="button" class="btn btn-secondary mb-3" id="add_leitao">+ Adicionar Leitão</button>
        <button type="submit" class="btn btn-success mb-3">Salvar Lote e Leitões</button>

    </form>

</div>

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

</body>
</html>