<?php
// Inclusão dos arquivos necessários
require_once("../Classes/Database.class.php");
include_once '../Includes/menuinclude.php'; // Incluindo o menu, se necessário
include_once '../config/config.inc.php'; // Incluindo a configuração de banco de dados

// Consultar todos os lotes
$sql_lotes = "SELECT id_lote, porca, lote, vivos, mortos, mumia FROM lotes ORDER BY id_lote ASC"; // Mudei para ASC para mostrar em ordem crescente
$lotes_result = Database::consultar($sql_lotes);

if ($lotes_result === false) {
    die("Erro na consulta dos lotes: " . Database::getLastError()); // Assumindo que Database tem um método para erro
}

$lotes = $lotes_result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Lista de Lotes</title>
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir este lote? Isso também excluirá todos os leitões associados e reordenará os IDs dos lotes restantes.")) {
                window.location.href = "excluir_lote.php?id_lote=" + id;
            }
        }
    </script>

</head>
<body>

        <style>
             

        </style>

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
</body>
</html>