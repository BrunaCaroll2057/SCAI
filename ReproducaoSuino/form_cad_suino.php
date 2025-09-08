<<<<<<< HEAD
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Cadastro do ciclo reprodutivo de cada porca</title>
</head>
<body>
    <?php
         include __DIR__ . '/Includes/menuinclude.php';
    ?>
=======
>>>>>>> 77d3840ed45f89ac693f6fc31dcf16991063eeac

<fieldset class="border p-4">
    <legend id="tit_sobre">Suínos</legend>

    <div class="mb-3">
        <label for="id" class="form-label">ID:</label>
        <input type="text" class="form-control" name="id" value="<?= htmlspecialchars($animal->getId()) ?>" readonly>
    </div>

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

    <hr>
    <h5>Nascidos:</h5>
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
        <textarea name="causa" class="form-control" cols="30" rows="4"><?= htmlspecialchars($animal->getCausa()) ?></textarea>
    </div>

    <hr>
    <h5>Desmama:</h5>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="dt_desmama" class="form-label">Data da desmama:</label>
            <input type="date" class="form-control" name="dt_desmama" value="<?= htmlspecialchars($animal->getDt_desmama()) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="ndesmamas" class="form-label">N° de desmamas:</label>
            <input type="number" class="form-control" name="ndesmamas" value="<?= htmlspecialchars($animal->getNdesmamas()) ?>">
        </div>

        <div class="mt-4">
            <button type="submit" name="acao" value="salvar" class="btn btn-success">Salvar</button>
            <button type="submit" name="acao" value="excluir" class="btn btn-danger">Excluir</button>
            <input type="reset" value="Cancelar" class="btn btn-secondary">
        </div>
        
    </
l