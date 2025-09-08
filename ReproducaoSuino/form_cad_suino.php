<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Cadastro do ciclo reprodutivo - Suínos</title>
</head>
<body>
    <?php include __DIR__ . '/../Includes/menuinclude.php'; ?>

    <div class="container mt-5 pt-3">
        <div class="card shadow p-4 rounded">
            <h3 class="text-center fw-bold mb-4">Cadastro de Suínos</h3>

            <form method="post">
                <fieldset>
                    <!-- ID -->
                    <div class="mb-3">
                        <label for="id" class="form-label">ID:</label>
                        <input type="text" class="form-control" name="id" value="<?= htmlspecialchars($animal->getId()) ?>" readonly>
                    </div>

                    <!-- Dados principais -->
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="nporca" class="form-label">N° Porca:</label>
                            <input type="number" class="form-control" name="nporca" value="<?= htmlspecialchars($animal->getNporca()) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="raca" class="form-label">Raça:</label>
                            <input type="text" class="form-control" name="raca" value="<?= htmlspecialchars($animal->getRaca()) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="dt_nascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" class="form-control" name="dt_nascimento" value="<?= htmlspecialchars($animal->getDt_nascimento()) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="macho" class="form-label">Macho:</label>
                        <input type="text" class="form-control" name="macho" value="<?= htmlspecialchars($animal->getMacho()) ?>">
                    </div>

                    <!-- Datas de parto -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dt_provparto" class="form-label">Data provável do parto:</label>
                            <input type="date" class="form-control" name="dt_provparto" value="<?= htmlspecialchars($animal->getDt_provparto()) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="dt_parto" class="form-label">Data do parto:</label>
                            <input type="date" class="form-control" name="dt_parto" value="<?= htmlspecialchars($animal->getDt_parto()) ?>">
                        </div>
                    </div>

                    <!-- Nascidos -->
                    <hr>
                    <h5 class="fw-bold">Nascidos</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="vivos" class="form-label">Vivos:</label>
                            <input type="number" class="form-control" name="vivos" value="<?= htmlspecialchars($animal->getVivos()) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="natimortos" class="form-label">Natimortos:</label>
                            <input type="number" class="form-control" name="natimortos" value="<?= htmlspecialchars($animal->getNatimortos()) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="mumificados" class="form-label">Mumificados:</label>
                            <input type="number" class="form-control" name="mumificados" value="<?= htmlspecialchars($animal->getMumificados()) ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="causa" class="form-label">Causas da morte (na maternidade):</label>
                        <textarea name="causa" class="form-control" rows="3"><?= htmlspecialchars($animal->getCausa()) ?></textarea>
                    </div>

                    <!-- Desmama -->
                    <hr>
                    <h5 class="fw-bold">Desmama</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="dt_desmama" class="form-label">Data da desmama:</label>
                            <input type="date" class="form-control" name="dt_desmama" value="<?= htmlspecialchars($animal->getDt_desmama()) ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ndesmamas" class="form-label">N° de desmamas:</label>
                            <input type="number" class="form-control" name="ndesmamas" value="<?= htmlspecialchars($animal->getNdesmamas()) ?>">
                        </div>
                    </div>

                    <!-- Botões -->
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