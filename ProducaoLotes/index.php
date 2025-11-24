<?php
session_start();

require_once("../Classes/ProducaoLotes.class.php");

if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
    $temRodape = true;
} else {
    $temRodape = false;
}

// Instancia padrão
$animal = new ProducaoLotes();

// Se for POST (salvar/excluir)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id           = $_POST['id'] ?? 0;
    $lote       = $_POST['lote'] ?? 0;
    $nporca       = $_POST['nporca'] ?? 0;
    $nmacho       = $_POST['nmacho'] ?? 0;
    $dt_cobertura = $_POST['dt_cobertura'] ?? '';
    $dt_provparto = $_POST['dt_provparto'] ?? '';
    $dt_parto     = $_POST['dt_parto'] ?? '';
    $vivos        = $_POST['vivos'] ?? 0;
    $natimorto    = $_POST['natimorto'] ?? 0;
    $mumia        = $_POST['mumia'] ?? 0;
    $recebimento  = $_POST['recebimento'] ?? '';
    $transferencia = $_POST['transferencia'] ?? '';
    $dt_desmama   = $_POST['dt_desmama'] ?? '';
    $ndesmamas    = $_POST['ndesmamas'] ?? 0;
    $obs          = $_POST['obs'] ?? '';
    $acao         = $_POST['acao'] ?? '';

    $animal = new ProducaoLotes(
        $id, $lote, $nporca, $nmacho, $dt_cobertura, $dt_provparto,
        $dt_parto, $vivos, $natimorto, $mumia, $recebimento,
        $transferencia, $dt_desmama, $ndesmamas, $obs  
    );

    if ($acao === 'salvar') {
        $resultado = ($id > 0) ? $animal->alterar() : $animal->inserir();
    } elseif ($acao === 'excluir') {
        $resultado = $animal->excluir();
    } else {
        $resultado = false;
    }

    if ($resultado) {
        header("Location: lista_suino.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao salvar dados.</div>";
    }
}

// Se for GET (carregar um suino existente)
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? 0;
    if ($id > 0) {
        $lista = ProducaoLotes::listar(1, $id);
        if (!empty($lista)) {
            $animal = $lista[0];
        }
    }
}
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

    <form action="<?= HOME ?>ProducaoLotes/index.php" method="post" enctype="multipart/form-data">
        <?php include __DIR__ . '/form_cad_suino.php'; ?>
    </form>

    <?php if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
