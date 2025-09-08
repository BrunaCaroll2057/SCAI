<?php
    require_once("../Classes/ReproducaoSuino.class.php");
    $busca = isset($_GET['busca'])?$_GET['busca']:0;
    $tipo = isset($_GET['tipo'])?$_GET['tipo']:0;
   
    $lista = ReproducaoSuino::listar($tipo, $busca);
    $itens = '';
    foreach($lista as $suino){
$item = file_get_contents(__DIR__ . '/itens_listagem.suino.html');
        $item = str_replace('{id}',$suino->getId(),$item);
        $item = str_replace('{nporca}',$suino->getNporca(),$item);
        $item = str_replace('{raca}',$suino->getRaca(),$item);
        $item = str_replace('{dt_nascimento}',$suino->getDt_nascimento(),$item);
        $item = str_replace('{macho}',$suino->getMacho(),$item);
        $item = str_replace('{dt_provparto}',$suino->getDt_provparto(),$item);
        $item = str_replace('{dt_parto}',$suino->getDt_parto(),$item);
        $item = str_replace('{vivos}',$suino->getVivos(),$item);
        $item = str_replace('{natimortos}',$suino->getNatimortos(),$item);
        $item = str_replace('{mumificados}',$suino->getMumificados(),$item);
        $item = str_replace('{causa}',$suino->getCausa(),$item);
        $item = str_replace('{dt_desmama}',$suino->getDt_desmama(),$item);
        $item = str_replace('{ndesmamas}',$suino->getNdesmamas(),$item);
        $itens .= $item;
    }
    $listagem = file_get_contents('C:/xampp/htdocs/SCAI/ReproducaoSuino/listagem_suino.html');
    $listagem = str_replace('{itens}',$itens,$listagem);
    print($listagem);
     
?>l