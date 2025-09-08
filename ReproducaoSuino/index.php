<?php
session_start();

require_once("../Classes/ReproducaoSuino.class.php");

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
$animal = new ReproducaoSuino();

// Se for POST (salvar/excluir)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id           = $_POST['id'] ?? 0;
    $nporca       = $_POST['nporca'] ?? 0;
    $raca         = $_POST['raca'] ?? '';
    $dt_nascimento= $_POST['dt_nascimento'] ?? '';
    $macho        = $_POST['macho'] ?? '';
    $dt_provparto = $_POST['dt_provparto'] ?? '';
    $dt_parto     = $_POST['dt_parto'] ?? '';
    $vivos        = $_POST['vivos'] ?? 0;
    $natimortos   = $_POST['natimortos'] ?? 0;
    $mumificados  = $_POST['mumificados'] ?? 0;
    $causa        = $_POST['causa'] ?? '';
    $dt_desmama   = $_POST['dt_desmama'] ?? '';
    $ndesmamas    = $_POST['ndesmamas'] ?? 0;
    $acao         = $_POST['acao'] ?? '';

    $animal = new ReproducaoSuino(
        $id,$nporca,$raca,$dt_nascimento,$macho,
        $dt_provparto,$dt_parto,$vivos,$natimortos,
        $mumificados,$causa,$dt_desmama,$ndesmamas
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
        $lista = ReproducaoSuino::listar(1, $id);
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
    <title>SCAI - Cadastro de Animais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<<<<<<< HEAD
<div class="container mt-10">
=======
<div class="container mt-4">
    <h1 class="mb-4">Manutenção de Animais</h1>
    <h2>Suínos</h2>
>>>>>>> a592f4cb77f4f860f0240f0fff0b5c37027c2273

    <form action="index.php" method="post" enctype="multipart/form-data">
        <?php include __DIR__ . '/form_cad_suino.php'; ?>
    </form>
</div>

<?php if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> a592f4cb77f4f860f0240f0fff0b5c37027c2273
