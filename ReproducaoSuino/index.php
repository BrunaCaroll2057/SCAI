<?php
require_once("../Classes/ReproducaoSuino.class.php");
include '../Includes/menuinclude3.php';

// Instancia padrão do objeto
$animal = new ReproducaoSuino();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $nporca = $_POST['nporca'] ?? 0;
    $raca = $_POST['raca'] ?? '';
    $dt_nascimento = $_POST['dt_nascimento'] ?? '';
    $macho = $_POST['macho'] ?? '';
    $dt_provparto = $_POST['dt_provparto'] ?? '';
    $dt_parto = $_POST['dt_parto'] ?? '';
    $vivos = $_POST['vivos'] ?? 0;
    $natimortos = $_POST['natimortos'] ?? 0;
    $mumificados = $_POST['mumificados'] ?? 0;
    $causa = $_POST['causa'] ?? '';
    $dt_desmama = $_POST['dt_desmama'] ?? '';
    $ndesmamas = $_POST['ndesmamas'] ?? 0;
    $acao = $_POST['acao'] ?? '';

    $animal = new ReproducaoSuino($id, $nporca, $raca, $dt_nascimento, $macho, $dt_provparto, $dt_parto, $vivos, $natimortos, $mumificados, $causa, $dt_desmama, $ndesmamas);

    if ($acao === 'salvar') {
        if ($id > 0) {
            $resultado = $animal->alterar();
        } else {
            $resultado = $animal->inserir();
        }
    } elseif ($acao === 'excluir') {
        $resultado = $animal->excluir();
    }

    if ($resultado) {
        header("Location: lista_suino.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao salvar dados.</div>";
    }
} else {
    // Método GET
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro do ciclo reprodutivo de cada porca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/estilo.css" />
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4" id="tit_sobre">Manutenção de Animais</h1>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?php include 'form_cad_suino.php'; ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
l