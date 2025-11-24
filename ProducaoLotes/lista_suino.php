<?php
require_once("../Classes/ProducaoLotes.class.php");

  session_start();

    if (file_exists(__DIR__ . '/../Includes/menuinclude.php')) {
        include __DIR__ . '/../Includes/menuinclude.php';
    }
    if (file_exists(__DIR__ . '/../Includes/rodapeinclude.php')) {
        $temRodape = true;
    } else {
        $temRodape = false;
    }
$tipo = $_SESSION['user_tipo'] ?? '';

$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$tipo  = isset($_GET['tipo'])  ? (int)$_GET['tipo'] : 0;

$lista = ProducaoLotes::listar($tipo, $busca);
$itens = '';
foreach ($lista as $suino) {
    $item = file_get_contents(__DIR__ . '/itens_listagem.suino.html');
    $item = str_replace('{id}',          $suino->getId(),          $item);
    $item = str_replace('{lote}', $suino->getLote(), $item);
    $item = str_replace('{nporca}',      $suino->getNporca(),$item);
    $item = str_replace('{nmacho}',        $suino->getnMacho(),$item);
    $item = str_replace('{dt_cobertura}',$suino->getDt_cobertura(),$item);
    $item = str_replace('{dt_provparto}',$suino->getDt_provparto(),$item);
    $item = str_replace('{dt_parto}',    $suino->getDt_parto(),$item);
    $item = str_replace('{vivos}',       $suino->getVivos(),$item);
    $item = str_replace('{natimorto}',  $suino->getNatimorto(),$item);
    $item = str_replace('{mumia}',$suino->getMumia(),  $item);
    $item = str_replace('{recebimento}',       $suino->getRecebimento(),$item);
    $item = str_replace('{transferencia}',       $suino->getTransferencia(),$item);
    $item = str_replace('{dt_desmama}',  $suino->getDt_desmama(),$item);
    $item = str_replace('{ndesmamas}',   $suino->getNdesmamas(),$item);
    $item = str_replace('{obs}',   $suino->getObs(),$item);
    $itens .= $item;
}

ob_start();
include 'listagem_suino.php';
$listagem = ob_get_clean();

$listagem = str_replace('{itens}', $itens, $listagem);

echo $listagem;

if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php';

?>