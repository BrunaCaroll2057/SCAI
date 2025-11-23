<?php
require_once("../Classes/ReproducaoSuino.class.php");

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

$lista = ReproducaoSuino::listar($tipo, $busca);
$itens = '';
foreach ($lista as $suino) {
    $item = file_get_contents( 'itens_listagem.suino.html');
    $item = str_replace('{id}',          $suino->getId(),          $item);
    $item = str_replace('{nporca}',      $suino->getNporca(),      $item);
    $item = str_replace('{raca}',        $suino->getRaca(),        $item);
    $item = str_replace('{dt_nascimento}',$suino->getDt_nascimento(),$item);
    $item = str_replace('{macho}',       $suino->getMacho(),       $item);
    $item = str_replace('{dt_provparto}',$suino->getDt_provparto(),$item);
    $item = str_replace('{dt_parto}',    $suino->getDt_parto(),    $item);
    $item = str_replace('{vivos}',       $suino->getVivos(),       $item);
    $item = str_replace('{natimortos}',  $suino->getNatimortos(),  $item);
    $item = str_replace('{mumificados}',$suino->getMumificados(),  $item);
    $item = str_replace('{causa}',       $suino->getCausa(),       $item);
    $item = str_replace('{dt_desmama}',  $suino->getDt_desmama(),  $item);
    $item = str_replace('{ndesmamas}',   $suino->getNdesmamas(),   $item);

    $itens .= $item;
}

include __DIR__ . '/listagem_suino.php';

if ($temRodape) include __DIR__ . '/../Includes/rodapeinclude.php';

?>