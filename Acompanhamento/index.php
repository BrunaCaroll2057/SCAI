<?php
session_start();

require_once("../Classes/Database.class.php");

// Corrige includes com caminho relativo
if (file_exists(__DIR__ . '/../Includes/menuinclude.php')) {
    include __DIR__ . '/../Includes/menuinclude.php';
}
if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
    $temRodape = true;
} else {
    $temRodape = false;
}

$id_lote = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/form_suino.css">

</head>
<body>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <?php include __DIR__ . '/form_cad_suino.php'; ?>
    </form>

<?php if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
