<?php
require_once("../Classes/ReproducaoSuino.class.php");

    include '../Includes/menuinclude3.php';
    
//ggg
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = isset($_POST['id'])?$_POST['id']:0;
    $nporca = isset($_POST['nporca'])?$_POST['nporca']:0;
    $raca = isset($_POST['raca'])?$_POST['raca']:"";
    $dt_nascimento = isset($_POST['dt_nascimento'])?$_POST['dt_nascimento']:"";
    $macho = isset($_POST['macho'])?$_POST['macho']:"";
    $dt_provparto = isset($_POST['dt_provparto'])?$_POST['dt_provparto']:"";
    $dt_parto = isset($_POST['dt_parto'])?$_POST['dt_parto']:"";
    $vivos = isset($_POST['vivos'])?$_POST['vivos']:"";
    $natimortos = isset($_POST['natimortos'])?$_POST['natimortos']:"";
    $mumificados = isset($_POST['mumificados'])?$_POST['mumificados']:"";
    $causa = isset($_POST['causa'])?$_POST['causa']:"";
    $dt_desmama = isset($_POST['dt_desmama'])?$_POST['dt_desmama']:"";
    $ndesmamas = isset($_POST['ndesmamas'])?$_POST['ndesmamas']:"";

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
        $formulario = str_replace('{vivos}','',$formulario);
        $formulario = str_replace('{natimortos}','',$formulario);
        $formulario = str_replace('{mumificados}','',$formulario);
        $formulario = str_replace('{causa}','',$formulario);
        $formulario = str_replace('{dt_desmama}','',$formulario);
        $formulario = str_replace('{ndesmamas}','',$formulario);
    }
    print($formulario); 


}

    include '../Includes/rodapeinclude.php';

?>