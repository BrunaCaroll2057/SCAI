<?php
session_start();

require_once("../Classes/Acompanhamento.class.php");

// Corrige includes com caminho relativo
if (file_exists(__DIR__ . '/../Includes/menuinclude.php')) {
    include __DIR__ . '/../Includes/menuinclude.php';
}
if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
    $temRodape = true;
} else {
    $temRodape = false;
}

// Instancia padrão
$animal = new Acompanhamento();

// Se for POST (salvar/excluir)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id           = $_POST['id'] ?? 0;
    $porca        = $_POST['porca'] ?? '';
    $lote         = $_POST['lote'] ?? '';
    $vivos        = $_POST['vivos'] ?? 0;
    $mortos        = $_POST['mortos'] ?? 0;
    $mumia        = $_POST['mumia'] ?? 0;
    $tmaternidade     = $_POST['tmaternidade'] ?? '';
    $parto        = $_POST['parto'] ?? 0;
    $desmame   = $_POST['desmame'] ?? 0;
    $screche  = $_POST['screche'] ?? 0;
    $venda        = $_POST['venda'] ?? '';
    $nascimento   = $_POST['nascimento'] ?? '';
    $mossa    = $_POST['mossa'] ?? 0;
    $sexo         = $_POST['sexo'] ?? '';
    $observacao         = $_POST['observacao'] ?? '';

    $animal = new Acompanhamento(
        $id,$porca,$lote,$vivos,$mortos,
        $mumia,$tmaternidade,$parto,$desmame,
        $screche,$venda,$nascimento,$mossa,$sexo,$observacao
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
        $lista = Acompanhamento::listar(1, $id);
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
</head>
<body>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <?php include __DIR__ . '/form_cad_suino.php'; ?>
    </form>

<?php if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
