<?php
require_once("../Classes/Animal.class.php");
//ggg
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = isset($_POST['id'])?$_POST['id']:0;
    $genero = isset($_POST['genero'])?$_POST['genero']:"";
    $idade = isset($_POST['idade'])?$_POST['idade']:0;
    $dt_nascimento = isset($_POST['dt_nascimento'])?$_POST['dt_nascimento']:"";
    $ult_vermifugacao = isset($_POST['ult_vermifugacao'])?$_POST['ult_vermifugacao']:"";
    $prox_vermifugacao = isset($_POST['prox_vermifugacao'])?$_POST['prox_vermifugacao']:"";
    $medicacao = isset($_POST['medicacao'])?$_POST['medicacao']:"";
    $hora_alimentacao = isset($_POST['hora_alimentacao'])?$_POST['hora_alimentacao']:"";
    $raca = isset($_POST['raca'])?$_POST['raca']:"";
    $setor = isset($_POST['SETOR_idSETOR'])?$_POST['SETOR_idSETOR']:0;
    $especie = isset($_POST['ESPECIE_idESPECIE'])?$_POST['ESPECIE_idESPECIE']:0;


    //$anexo = isset($_POST['anexo'])?$_POST['anexo']:"";
    $acao = isset($_POST['acao'])?$_POST['acao']:"";


    $animal = new Animal($id,$genero,$idade,$dt_nascimento,$ult_vermifugacao,$prox_vermifugacao,$medicacao,$hora_alimentacao,$raca,$setor,$especie);
    if ($acao == 'salvar')
        if ($id > 0)
            $resultado = $animal->alterar();
        else
            $resultado = $animal->inserir();
    elseif ($acao == 'excluir')
        $resultado = $animal->excluir();

    if ($resultado)
        header("Location: lista_animal.php");
    else
        echo "Erro ao salvar dados: ". $animal;
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $formulario = file_get_contents('form_cad_animal.php');

    $id = isset($_GET['id'])?$_GET['id']:0;
    $resultado = Animal::listar(1,$id);
    if ($resultado){
        $animal = $resultado[0];
        $formulario = str_replace('{id}',$animal->getId(),$formulario);
        $formulario = str_replace('{genero}',$animal->getGenero(),$formulario);
        $formulario = str_replace('{idade}',$animal->getIdade(),$formulario);
        $formulario = str_replace('{dt_nascimento}',$animal->getDt_nascimento(),$formulario);
        $formulario = str_replace('{ult_vermifugacao}',$animal->getUlt_vermifugacao(),$formulario);
        $formulario = str_replace('{prox_vermifugacao}',$animal->getProx_vermifugacao(),$formulario);
        $formulario = str_replace('{medicacao}',$animal->getMedicacao(),$formulario);
        $formulario = str_replace('{hora_alimentacao}',$animal->getHora_alimentacao(),$formulario);
        $formulario = str_replace('{raca}',$animal->getRaca(),$formulario);
        $formulario = str_replace('{SETOR_idSETOR}',$animal->getSetor(),$formulario);
        $formulario = str_replace('{ESPECIE_idESPECIE}',$animal->getEspecie(),$formulario);

    }else{
        $formulario = str_replace('{id}',0,$formulario);
        $formulario = str_replace('{genero}','',$formulario);
        $formulario = str_replace('{idade}',0,$formulario);
        $formulario = str_replace('{dt_nascimento}','',$formulario);
        $formulario = str_replace('{ult_vermifugacao}','',$formulario);
        $formulario = str_replace('{prox_vermifugacao}','',$formulario);
        $formulario = str_replace('{medicacao}','',$formulario);
        $formulario = str_replace('{hora_alimentacao}','',$formulario);
        $formulario = str_replace('{raca}','',$formulario);
        $formulario = str_replace('{SETOR_idSETOR}',0,$formulario);
        $formulario = str_replace('{ESPECIE_idESPECIE}',0,$formulario);
    }
    print($formulario); 


}
?>