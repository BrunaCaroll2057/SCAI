<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Cadastro de Acompanhamento - Suínos</title>

    <style>
        .table-box {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 40px;
        }

        .section-header {
            background: #f1f1f1;
            padding: 6px 10px;
            font-weight: bold;
            border-radius: 4px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        label {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '/../Includes/menuinclude.php'; ?>

    <div class="container mt-10 pt-3">
        <div class="card shadow p-4 rounded">

            <h3 class="text-center fw-bold mb-4">Acompanhamento da Leitegada - Do Nascimento ao Abate</h3>

            <form method="post">

                <!-- PRIMEIRA TABELA — DADOS DA LEITEGADA -->
                <div class="table-box">

                    <div class="section-header text-center">Dados da Leitegada</div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Porca:</label>
                            <input type="number" class="form-control" name="porca" value="<?= htmlspecialchars($animal->getPorca()) ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Lote:</label>
                            <input type="number" class="form-control" name="lote" value="<?= htmlspecialchars($animal->getLote()) ?>">
                        </div>
                    </div>

                    <div class="section-header">Nascidos</div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Vivos:</label>
                            <input type="number" class="form-control" name="vivos" value="<?= htmlspecialchars($animal->getVivos()) ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Mortos:</label>
                            <input type="number" class="form-control" name="mortos" value="<?= htmlspecialchars($animal->getMortos()) ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Mumificados:</label>
                            <input type="number" class="form-control" name="mumia" value="<?= htmlspecialchars($animal->getMumia()) ?>">
                        </div>
                    </div>

                    <div class="section-header">Datas</div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Transferência maternidade:</label>
                            <input type="date" class="form-control" name="tmaternidade" value="<?= htmlspecialchars($animal->getTmaternidade()) ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Parto:</label>
                            <input type="date" class="form-control" name="parto" value="<?= htmlspecialchars($animal->getParto()) ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Desmame:</label>
                            <input type="date" class="form-control" name="desmame" value="<?= htmlspecialchars($animal->getDesmame()) ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Saída da creche:</label>
                            <input type="date" class="form-control" name="screche" value="<?= htmlspecialchars($animal->getScreche()) ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Venda:</label>
                            <input type="date" class="form-control" name="venda" value="<?= htmlspecialchars($animal->getVenda()) ?>">
                        </div>
                    </div>
                </div>

                <!-- SEGUNDA TABELA — CONTROLE INDIVIDUAL -->
                <div class="table-box">

                    <div class="section-header text-center">Controle Individual dos Leitões</div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>ID:</label>
                            <input type="text" class="form-control" name="id" value="<?= htmlspecialchars($animal->getId()) ?>" readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Mossa:</label>
                            <input type="text" class="form-control" name="mossa" value="<?= htmlspecialchars($animal->getMossa()) ?>">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Sexo:</label>
                            <select class="form-control" name="sexo">
                                <option value="Masculino" <?= ($animal->getSexo() == "Masculino" ? "selected" : "") ?>>Masculino</option>
                                <option value="Feminino" <?= ($animal->getSexo() == "Feminino" ? "selected" : "") ?>>Feminino</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Observações:</label>
                            <input type="text" class="form-control" name="observacao" value="<?= htmlspecialchars($animal->getObservacao()) ?>">
                        </div>
                    </div>

                    <div class="section-header">Datas do Leitão</div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Nascimento:</label>
                            <input type="date" class="form-control" name="nascimento" value="<?= htmlspecialchars($animal->getNascimento()) ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Desmame:</label>
                            <input type="date" class="form-control" name="desmame" value="<?= htmlspecialchars($animal->getDesmame()) ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Saída da creche:</label>
                            <input type="date" class="form-control" name="screche" value="<?= htmlspecialchars($animal->getScreche()) ?>">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Venda:</label>
                            <input type="date" class="form-control" name="venda" value="<?= htmlspecialchars($animal->getVenda()) ?>">
                        </div>
                    </div>
                </div>

                <!-- BOTÕES -->
                <div class="d-flex justify-content-end gap-2 mt-3">
                    <button type="submit" name="acao" value="salvar" class="btn btn-success">Salvar</button>
                    <button type="submit" name="acao" value="excluir" class="btn btn-danger">Excluir</button>
                    <input type="reset" value="Cancelar" class="btn btn-secondary">
                </div>

            </form>

        </div>
    </div>

</body>
</html>
