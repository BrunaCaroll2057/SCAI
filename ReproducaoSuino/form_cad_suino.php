<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/form_suino.css">


    <title>Cadastro do ciclo reprodutivo - Suínos</title>
</head>
<body>
<?php include __DIR__ . '/../Includes/menuinclude.php'; ?>
<div class="container mt-10 pt-3">
    <div class="card shadow p-4 rounded">
        <h3 class="text-center fw-bold mb-4">Ciclo reprodutivo de cada porca</h3>

        <form method="post">
            <fieldset>

                <table class="tabela-ficha">

                    <tr>
                        <th class="titulo-secao" colspan="4">Identificação</th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label class="form-label">ID:</label>
                            <input type="text" class="form-control" name="id" 
                                   value="<?= htmlspecialchars($animal->getId()) ?>" readonly>
                        </td>
                    </tr>

                    <tr>
                        <th class="titulo-secao" colspan="4">Dados principais</th>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label">N° Porca:</label>
                            <input type="number" class="form-control" name="nporca" 
                                   value="<?= htmlspecialchars($animal->getNporca()) ?>">
                        </td>
                        <td>
                            <label class="form-label">Raça:</label>
                            <input type="text" class="form-control" name="raca" 
                                   value="<?= htmlspecialchars($animal->getRaca()) ?>">
                        </td>
                        <td colspan="2">
                            <label class="form-label">Data de Nascimento:</label>
                            <input type="date" class="form-control" name="dt_nascimento" 
                                   value="<?= htmlspecialchars($animal->getDt_nascimento()) ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <label class="form-label">Macho:</label>
                            <input type="text" class="form-control" name="macho" 
                                   value="<?= htmlspecialchars($animal->getMacho()) ?>">
                        </td>
                    </tr>

                    <tr>
                        <th class="titulo-secao" colspan="4">Parto</th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label class="form-label">Data provável do parto:</label>
                            <input type="date" class="form-control" name="dt_provparto" 
                                   value="<?= htmlspecialchars($animal->getDt_provparto()) ?>">
                        </td>
                        <td colspan="2">
                            <label class="form-label">Data do parto:</label>
                            <input type="date" class="form-control" name="dt_parto" 
                                   value="<?= htmlspecialchars($animal->getDt_parto()) ?>">
                        </td>
                    </tr>

                    <tr>
                        <th class="titulo-secao" colspan="4">Nascidos</th>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-label">Vivos:</label>
                            <input type="number" class="form-control" name="vivos" 
                                   value="<?= htmlspecialchars($animal->getVivos()) ?>">
                        </td>
                        <td>
                            <label class="form-label">Natimortos:</label>
                            <input type="number" class="form-control" name="natimortos" 
                                   value="<?= htmlspecialchars($animal->getNatimortos()) ?>">
                        </td>
                        <td colspan="2">
                            <label class="form-label">Mumificados:</label>
                            <input type="number" class="form-control" name="mumificados" 
                                   value="<?= htmlspecialchars($animal->getMumificados()) ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <label class="form-label">Causas da morte (na maternidade):</label>
                            <textarea name="causa" class="form-control" rows="3">
                                <?= htmlspecialchars($animal->getCausa()) ?>
                            </textarea>
                        </td>
                    </tr>

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
