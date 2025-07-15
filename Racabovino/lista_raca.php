<?php

include '../processologin/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

    require_once("../Classes/Vacinab.class.php");

    $busca = isset($_GET['busca'])?$_GET['busca']:0;
    $tipo = isset($_GET['tipo'])?$_GET['tipo']:0;
   
    $lista = VacinaBovino::listar($tipo, $busca);
    $itens = '';
    foreach($lista as $vacinab){
        $item = file_get_contents('itens_listagem_vacinab.html');
        $item = str_replace('{id}',$vacinab->getId(),$item);
        $item = str_replace('{nome}',$vacinab->getNome(),$item);
        $itens .= $item;
    }
    $listagem = file_get_contents('listagem_vacinab.html');
    $listagem = str_replace('{itens}',$itens,$listagem);
    print($listagem);
     
?>