<?php
session_start();

require_once("../Classes/Database.class.php");
include_once '../config/config.inc.php';

if (file_exists(__DIR__ . '/../Includes/menuinclude.php')) {
    include __DIR__ . '/../Includes/menuinclude.php';
}
if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
    $temRodape = true;
} else {
    $temRodape = false;
}

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
    <link rel="stylesheet" href="../css/estilo.css">
    <style>
        form fieldset {
            border: 2px solid #198754;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 900px;
            background-color: #e8f5ee;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }

        form legend {
            font-weight: bold;
            color: #198754;
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        form label {
            margin-right: 10px;
            font-weight: 600;
        }

        form input[type="text"],
        form select {
            padding: 6px 12px;
            margin: 8px 12px 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        form button {
            background-color: #198754;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #146c43;
        }

        h1 {
            color: #343a40;
            font-size: 2rem;
            margin-bottom: 25px;
        }

        table {
            border-collapse: collapse;
            width: 100%;            
            background-color: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        thead th {
            background-color: #198754 !important;
            color: white !important;
            padding: 12px 15px;
            text-align: center;
            font-weight: 600;
            box-shadow: inset -1px 0 0 #146c43;
            border-right: none;
        }

        thead th:last-child {
            box-shadow: none;
        }

        tbody td {
            padding: 10px 15px;
            text-align: center;
            color: #333;
            border-bottom: 1px solid #dee2e6;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e8f5ee;
        }

        .btn-voltar {
            display: inline-block;
            background-color: #198754;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: 600;
            font-size: 1rem;
            margin-top: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }   

        .btn-voltar:hover {
            background-color: #146c43;
            text-decoration: none;
        }

        .btn-verde {
            background-color: #198754;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-block;
            text-align: center;
        }

        .btn-verde:hover {
            background-color: #146c43;
            text-decoration: none;
            color: white;
        }

        form {
            display: flex;
            justify-content: center;
            width: 100%;
        }
    </style>
    <script>
        function confirmarExclusao(id) {
            if (confirm("Tem certeza que deseja excluir este lote? Isso também excluirá todos os leitões associados e reordenará os IDs dos lotes restantes.")) {
                window.location.href = "excluir_lote.php?id_lote=" + id;
            }
        }
    </script>

</head>
<body>

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
                            <a href="visualizar_lote.php?id_lote=<?php echo $lote['id_lote']; ?>" class="btn-verde btn-sm">Visualizar</a>
                            <button onclick="confirmarExclusao(<?php echo $lote['id_lote']; ?>)" class="btn btn-danger btn-sm">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum lote cadastrado.</p>
    <?php endif; ?>

    <div>
        <a href="index.php" class="btn btn-success mt-3">Cadastrar Novo Lote</a>
        <a href="../menu_suino.php" class="btn btn-success mt-3">Voltar ao Menu</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
    if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php';
?>

</body>
</html>