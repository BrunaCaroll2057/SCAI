<?php
require_once("../Classes/Database.class.php");
include_once '../config/config.inc.php'; 

if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
    $temRodape = true;
} else {
    $temRodape = false;
}

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
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php
if (file_exists(__DIR__ . '/../Includes/menuinclude.php')) {
    include __DIR__ . '/../Includes/menuinclude.php';
}
?>

<div class="container my-5">
    <h3 class="mb-3">Dados do Lote Cadastrado</h3>

    <!-- DADOS DO LOTE -->
    <h4>Dados Gerais do Lote</h4>
    <table class="table table-bordered">
        <tr><th>Porca:</th><td><?php echo htmlspecialchars($lote['porca']); ?></td></tr>
        <tr><th>Lote:</th><td><?php echo htmlspecialchars($lote['lote']); ?></td></tr>
        <tr><th>Vivos:</th><td><?php echo htmlspecialchars($lote['vivos']); ?></td></tr>
        <tr><th>Mortos:</th><td><?php echo htmlspecialchars($lote['mortos']); ?></td></tr>
        <tr><th>Mumificados:</th><td><?php echo htmlspecialchars($lote['mumia']); ?></td></tr>
        <tr><th>Trans. Maternidade:</th><td><?php echo htmlspecialchars($lote['tmaternidade'] ?? 'N/A'); ?></td></tr>
        <tr><th>Parto:</th><td><?php echo htmlspecialchars($lote['parto_lote'] ?? 'N/A'); ?></td></tr>
        <tr><th>Desmame:</th><td><?php echo htmlspecialchars($lote['desmame_lote'] ?? 'N/A'); ?></td></tr>
        <tr><th>Saída de Creche:</th><td><?php echo htmlspecialchars($lote['screche_lote'] ?? 'N/A'); ?></td></tr>
        <tr><th>Venda:</th><td><?php echo htmlspecialchars($lote['venda_lote'] ?? 'N/A'); ?></td></tr>
    </table>

    <hr>

    <h4>Dados dos Leitões</h4>
    <?php if (count($leitoes) > 0): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mossa</th>
                    <th>Sexo</th>
                    <th>Observação</th>
                    <th>Nascimento</th>
                    <th>Desmame</th>
                    <th>Saída Creche</th>
                    <th>Venda</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leitoes as $leitao): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($leitao['mossa']); ?></td>
                        <td><?php echo htmlspecialchars($leitao['sexo']); ?></td>
                        <td><?php echo htmlspecialchars($leitao['observacao']); ?></td>
                        <td><?php echo htmlspecialchars($leitao['nascimento'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($leitao['desmame_animal'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($leitao['screche_animal'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($leitao['venda_animal'] ?? 'N/A'); ?></td>
                    </tr>
                <?php 
                    endforeach; 
                ?>
            </tbody>
        </table>
    <?php 
        else:
    ?>

        <p>Nenhum leitão cadastrado para este lote.</p>

    <?php 
        endif;
    ?>

    <br>
        <a href="index.php" class="btn btn-primary">Cadastrar Novo Lote</a>
        <a href="editar_lotes.php?id_lote=<?php echo $id_lote; ?>" class="btn btn-warning">Editar Lote</a>
    </div>

<?php
    if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php';
?>

</body>
</html>