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

require_once("../Classes/RacaBovino.class.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = isset($_POST['id'])?$_POST['id']:0;
    $nome = isset($_POST['nome'])?$_POST['nome']:"";
   
    $acao = isset($_POST['acao'])?$_POST['acao']:"";

    $racab = new RacaBovino($id,$nome);
    if ($acao == 'salvar')
        if ($id > 0)
            $resultado = $racab->alterar();
        else
            $resultado = $racab->inserir();
    elseif ($acao == 'excluir')
        $resultado = $racab->excluir();

    if ($resultado)
        header("Location: index.php");
    else
        echo "Erro ao salvar dados: ". $racab;
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $formulario = file_get_contents('form_cad_racabovino.html');

    $id = isset($_GET['id'])?$_GET['id']:0;
    $resultado = RacaBovino::listar(1,$id);
    if ($resultado){
        $usuario = $resultado[0];
        $formulario = str_replace('{id}',$usuario->getId(),$formulario);
        $formulario = str_replace('{nome}',$usuario->getNome(),$formulario);
    }else{
        $formulario = str_replace('{id}',0,$formulario);
        $formulario = str_replace('{nome}','',$formulario);
    }
    print($formulario); 

}
?>