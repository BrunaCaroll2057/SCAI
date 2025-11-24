<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/form_suino.css">


    <title>Cadastro do Acompanhamento Produtivo dos Lotes de Porcas - Suínos</title>
</head>
<body>
<?php 
    include __DIR__ . '/../Includes/menuinclude.php'; 
?>

<div class="container mt-10 pt-3">
    <div class="card shadow p-4 rounded">
        <h3 class="text-center fw-bold mb-4">Acompanhamento Produtivo dos Lotes de Porcas</h3>

        <form method="post">
            <fieldset>

                <table class="tabela-ficha">

                    <!-- ID -->
                    <tr>
                        <th class="titulo-secao" colspan="4">N°</th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="form-label">ID:</label>
                            <input type="text" class="form-control" name="id" 
                                   value="<?= htmlspecialchars($animal->getId()) ?>" readonly>
                        </td>
                    </tr>

                    <tr> 
                        <th class="titulo-secao" colspan="4">Lote</th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="form-label">Nº do Lote:</label>
                            <input type="number" class="form-control" name="lote" value="<?= htmlspecialchars($animal->getLote()) ?>">
                        </td>
                    </tr>

                    <!-- Dados principais -->
                    <tr>
                        <th class="titulo-secao" colspan="4">Cobertura</th>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label">N° da Porca:</label>
                            <input type="number" class="form-control" name="nporca" 
                                   value="<?= htmlspecialchars($animal->getNporca()) ?>">
                        </td>
                        <td>
                            <label class="form-label">N° do Macho</label>
                            <input type="text" class="form-control" name="nmacho" 
                                   value="<?= htmlspecialchars($animal->getNmacho()) ?>">
                        </td>
                        <td colspan="2">
                            <label class="form-label">Data da Cobertura:</label>
                            <input type="date" class="form-control" name="dt_cobertura" 
                                   value="<?= htmlspecialchars($animal->getDt_cobertura()) ?>">
                        </td>
                    </tr>

                    <tr>
                        <th class="titulo-secao" colspan="4">Parto</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="form-label">Data provável do parto:</label>
                            <input type="date" class="form-control" name="dt_provparto" value="<?= htmlspecialchars($animal->getDt_provparto()) ?>">
                        </td>
                        <td colspan="2">
                            <label class="form-label">Data do parto:</label>
                            <input type="date" class="form-control" name="dt_parto" value="<?= htmlspecialchars($animal->getDt_parto()) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="form-label">Vivos:</label>
                            <input type="number" class="form-control" name="vivos" value="<?= htmlspecialchars($animal->getVivos()) ?>">
                        </td>
                        <td colspan="2">
                            <label class="form-label">Natimortos:</label>
                            <input type="number" class="form-control" name="natimorto" value="<?= htmlspecialchars($animal->getNatimorto()) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="form-label">Mumificados:</label>
                            <input type="number" class="form-control" name="mumia" value="<?= htmlspecialchars($animal->getMumia()) ?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <th class="titulo-secao" colspan="4">Maternidade</th>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label">Recebimento:</label>
                            <input type="date" class="form-control" name="recebimento" 
                                   value="<?= htmlspecialchars($animal->getRecebimento()) ?>">
                        </td>
                        <td>
                            <label class="form-label">Transferido:</label>
                            <input type="date" class="form-control" name="transferencia" 
                                   value="<?= htmlspecialchars($animal->getTransferencia()) ?>">
                        </td>

                    <tr>

                    <tr>
                        <th class="titulo-secao" colspan="4">Desmama</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="form-label">Data da desmama:</label>
                            <input type="date" class="form-control" name="dt_desmama" 
                                   value="<?= htmlspecialchars($animal->getDt_desmama()) ?>">
                        </td>
                        <td colspan="2">
                            <label class="form-label">N° de desmamas:</label>
                            <input type="number" class="form-control" name="ndesmamas" 
                                   value="<?= htmlspecialchars($animal->getNdesmamas()) ?>">
                        </td>
                    </tr>

                    <td colspan="4">
                        <label class="form-label">Observação:</label>
                        <textarea name="obs" class="form-control" rows="3"><?= htmlspecialchars($animal->getObs()) ?></textarea>
                    </td>                    
                </tr>
                </table>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" name="acao" value="salvar" class="btn btn-success">Salvar</button>
                    <button type="submit" name="acao" value="excluir" class="btn btn-danger">Excluir</button>
                    <input type="reset" value="Cancelar" class="btn btn-secondary">
                </div>

            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
