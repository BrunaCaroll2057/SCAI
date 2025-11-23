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

<?php
    $id_lote_hidden = $_GET['id'] ?? '';
?>

<div class="container mt-5">
    <div class="card shadow p-4 rounded">
        <h3 class="mb-3 text-center">Cadastro de Lote e Leitões</h3>  <!-- Título movido para dentro da card e centralizado -->

        <form id="form_completo" action="salvar_lotes_e_leitoes.php" method="POST">
            
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
                    <td>Vivos:</td><td><input type="number" name="vivos" class="form-control" required></td>
                    <td>Mortos:</td><td><input type="number" name="mortos" class="form-control" required></td>
                    <td>Múmia:</td><td><input type="number" name="mumia" class="form-control" required></td>
                </tr>
            </table>

            <table class="tabela-ficha">
                <tr><th class="titulo-secao" colspan="6">Datas</th></tr>
                <tr>
                    <td>Trans. Maternidade:</td><td><input type="date" name="tmaternidade" class="form-control" required></td>
                    <td>Parto:</td><td><input type="date" name="parto_lote" class="form-control" required></td>
                    <td>Desmame:</td><td><input type="date" name="desmame_lote" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Saída de creche:</td><td><input type="date" name="screche_lote" class="form-control" required></td>
                    <td>Venda:</td><td><input type="date" name="venda_lote" class="form-control" required></td>
                </tr>
            </table>

            <hr class="my-5">

            <h4 class="mb-3">Dados Individuais dos Leitões</h4>
            <input type="hidden" name="id_lote" value="<?php echo htmlspecialchars($id_lote_hidden); ?>">

            <table class="tabela-ficha tabela-larga" id="leitoes_table">
                <thead>
                    <tr>
                        <th class="titulo-secao">Nº</th>
                        <th class="titulo-secao" id="mossa">Mossa</th>
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
                        <td><input type="text" name="mossa[]" class="form-control" id="mossa"></td>
                        <td><select name="sexo[]" class="form-select" id="select-sx">
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

            <div class="d-flex justify-content-end gap-2 mt-3"> 
                <button type="button" class="btn btn-secondary" id="add_leitao">Adicionar +</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>
    </div>
</div>

<script>
    let leitoesCount = 1;

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

    function excluirLeitao(button) {
        const row = button.closest('tr');
        row.remove();
        atualizarNumeracao();
    }

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