<?php
// Inclusão dos arquivos necessários
require_once("../Classes/Database.class.php");
include_once '../config/config.inc.php';

// Consultar todos os lotes
$sql_lotes = "SELECT id_lote, porca, lote, vivos, mortos, mumia FROM lotes ORDER BY id_lote ASC";
$lotes_result = Database::consultar($sql_lotes);

if ($lotes_result === false) {
    die("Erro na consulta dos lotes: " . Database::getLastError());
}

$lotes = $lotes_result->fetchAll(PDO::FETCH_ASSOC);
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
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir este lote? Isso também excluirá todos os leitões associados e reordenará os IDs dos lotes restantes.")) {
                window.location.href = "excluir_lote.php?id_lote=" + id;
            }
        }
    </script>

</head>
<body>
<?php 
   include __DIR__ . '/Includes/menuinclude.php';
?>

<div class="container my-5">
    <h3 class="mb-3">Lista de Lotes de Porca</h3>

    <?php if (count($lotes) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID do Lote</th>
                    <th>Porca</th>
                    <th>Lote</th>
                    <th>Vivos</th>
                    <th>Mortos</th>
                    <th>Mumificados</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lotes as $lote): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($lote['id_lote']); ?></td>
                        <td><?php echo htmlspecialchars($lote['porca']); ?></td>
                        <td><?php echo htmlspecialchars($lote['lote']); ?></td>
                        <td><?php echo htmlspecialchars($lote['vivos']); ?></td>
                        <td><?php echo htmlspecialchars($lote['mortos']); ?></td>
                        <td><?php echo htmlspecialchars($lote['mumia']); ?></td>
                        <td>
                            <a href="visualizar_lote.php?id_lote=<?php echo $lote['id_lote']; ?>" class="btn btn-primary btn-sm">Visualizar</a>
                            <button onclick="confirmarExclusao(<?php echo $lote['id_lote']; ?>)" class="btn btn-danger btn-sm">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum lote cadastrado.</p>
    <?php endif; ?>

    <br>
    <a href="index.php" class="btn btn-primary">Cadastrar Novo Lote</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    include "../Includes/rodapeinclude.php";
    ?>  

</body>
</html>