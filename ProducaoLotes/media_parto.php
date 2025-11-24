<?php
require_once("../Classes/ProducaoLotes.class.php");

  session_start();

    if (file_exists(__DIR__ . '/../Includes/menuinclude.php')) {
        include __DIR__ . '/../Includes/menuinclude.php';
    }
    if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
        $temRodape = true;
    } else {
        $temRodape = false;
    }
$tipo = $_SESSION['user_tipo'] ?? '';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$lote = filter_input(INPUT_GET, 'lote', FILTER_VALIDATE_INT);

if (!$id) {
    die("Parto inválido.");
}

// Buscar apenas o parto selecionado
$lista = ProducaoLotes::listar(1, $id);

if (!$lista || count($lista) == 0) {
    die("Parto não encontrado.");
}

$parto = $lista[0];

$vivos = (int)$parto->getVivos();
$nat = (int)$parto->getNatimorto();
$mumia = (int)$parto->getMumia();

$total = $vivos + $nat + $mumia;

$percVivos = $total > 0 ? $vivos / $total : 0;
$percNat   = $total > 0 ? $nat / $total : 0;
$percMumia = $total > 0 ? $mumia / $total : 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>

<div class="container text-center mt-5">

    <h2 class="fw-bold">Média do Parto – ID <?= htmlspecialchars($id) ?></h2>
    <h4 class="mb-4">Lote <?= htmlspecialchars($lote) ?></h4>

    <div class="d-flex justify-content-center">
        <table class="table table-bordered mt-4" style="max-width: 600px;">
            <tr>
                <th>Total de nascidos</th>
                <td><?= $total ?></td>
            </tr>

            <tr>
                <th>Nascidos vivos</th>
                <td><?= $vivos ?> (<?= number_format($percVivos * 100, 2, ',', '.') ?>%)</td>
            </tr>

            <tr>
                <th>Natimortos</th>
                <td><?= $nat ?> (<?= number_format($percNat * 100, 2, ',', '.') ?>%)</td>
            </tr>

            <tr>
                <th>Mumificados</th>
                <td><?= $mumia ?> (<?= number_format($percMumia * 100, 2, ',', '.') ?>%)</td>
            </tr>
        </table>
    </div>

    <a href="lista_suino.php" class="btn btn-secondary mt-3">
        Voltar
    </a>

</div>

<?php
  include "../Includes/rodapeinclude.php";
?>  

</body>
</html>