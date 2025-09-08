<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

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

<?php
    
include __DIR__ . '/Includes/menuinclude.php';
require_once("../Classes/ReproducaoSuino.class.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = isset($_POST['id'])?$_POST['id']:0;
    $nporca = isset($_POST['nporca'])?$_POST['nporca']:0;
    $raca = isset($_POST['raca'])?$_POST['raca']:"";
    $dt_nascimento = isset($_POST['dt_nascimento'])?$_POST['dt_nascimento']:"";
    $macho = isset($_POST['macho'])?$_POST['macho']:"";
    $dt_provparto = isset($_POST['dt_provparto'])?$_POST['dt_provparto']:"";
    $dt_parto = isset($_POST['dt_parto'])?$_POST['dt_parto']:"";
    $vivos = isset($_POST['vivos'])?$_POST['vivos']:0;
    $natimortos = isset($_POST['natimortos'])?$_POST['natimortos']:0;
    $mumificados = isset($_POST['mumificados'])?$_POST['mumificados']:0;
    $causa = isset($_POST['causa'])?$_POST['causa']:"";
    $dt_desmama = isset($_POST['dt_desmama'])?$_POST['dt_desmama']:"";
    $ndesmamas = isset($_POST['ndesmamas'])?$_POST['ndesmamas']:0;

    //$anexo = isset($_POST['anexo'])?$_POST['anexo']:"";
    $acao = isset($_POST['acao'])?$_POST['acao']:"";


    $suino = new ReproducaoSuino($id,$nporca,$raca,$dt_nascimento,$macho,$dt_provparto,$dt_parto,$vivos,$natimortos,$mumificados,$causa,$dt_desmama,$ndesmamas);
    if ($acao == 'salvar')
        if ($id > 0)
            $resultado = $suino->alterar();
        else
            $resultado = $suino->inserir();
    elseif ($acao == 'excluir')
        $resultado = $suino->excluir();

    if ($resultado)
        header("Location: lista_suino.php");
    else
        echo "Erro ao salvar dados: ". $suino;
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $formulario = file_get_contents('form_cad_suino.php');

    $id = isset($_GET['id'])?$_GET['id']:0;
    $resultado = ReproducaoSuino::listar(1,$id);
    if ($resultado){
        $suino = $resultado[0];
        $formulario = str_replace('{id}',$suino->getId(),$formulario);
        $formulario = str_replace('{nporca}',$suino->getNporca(),$formulario);
        $formulario = str_replace('{raca}',$suino->getRaca(),$formulario);
        $formulario = str_replace('{dt_nascimento}',$suino->getDt_nascimento(),$formulario);
        $formulario = str_replace('{macho}',$suino->getMacho(),$formulario);
        $formulario = str_replace('{dt_provparto}',$suino->getDt_provparto(),$formulario);
        $formulario = str_replace('{dt_parto}',$suino->getDt_parto(),$formulario);
        $formulario = str_replace('{vivos}',$suino->getVivos(),$formulario);
        $formulario = str_replace('{natimortos}',$suino->getNatimortos(),$formulario);
        $formulario = str_replace('{mumificados}',$suino->getMumificados(),$formulario);
        $formulario = str_replace('{causa}',$suino->getCausa(),$formulario);
        $formulario = str_replace('{dt_desmama}',$suino->getDt_desmama(),$formulario);
        $formulario = str_replace('{ndesmamas}',$suino->getNdesmamas(),$formulario);

    }else{
        $formulario = str_replace('{id}',0,$formulario);
        $formulario = str_replace('{nporca}','',$formulario);
        $formulario = str_replace('{raca}','',$formulario);
        $formulario = str_replace('{dt_nascimento}','',$formulario);
        $formulario = str_replace('{macho}','',$formulario);
        $formulario = str_replace('{dt_provparto}','',$formulario);
        $formulario = str_replace('{dt_parto}','',$formulario);
        $formulario = str_replace('{vivos}',0,$formulario);
        $formulario = str_replace('{natimortos}',0,$formulario);
        $formulario = str_replace('{mumificados}',0,$formulario);
        $formulario = str_replace('{causa}','',$formulario);
        $formulario = str_replace('{dt_desmama}','',$formulario);
        $formulario = str_replace('{ndesmamas}',0,$formulario);
    }
    print($formulario); 


}

    include '../Includes/rodapeinclude.php';

?>

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