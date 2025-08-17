<?php
    require_once("../Classes/Animal.class.php");
    $busca = isset($_GET['busca'])?$_GET['busca']:0;
    $tipo = isset($_GET['tipo'])?$_GET['tipo']:0;
   
    $lista = Animal::listar($tipo, $busca);
    $itens = '';
    foreach($lista as $animal){
        $item = file_get_contents('itens_listagem_animal.html');
        $item = str_replace('{id}',$animal->getId(),$item);
        $item = str_replace('{genero}',$animal->getGenero(),$item);
        $item = str_replace('{idade}',$animal->getIdade(),$item);
        $item = str_replace('{dt_nascimento}',$animal->getDt_nascimento(),$item);
        $item = str_replace('{ult_vermifugacao}',$animal->getUlt_vermifugacao(),$item);
        $item = str_replace('{prox_vermifugacao}',$animal->getProx_vermifugacao(),$item);
        $item = str_replace('{medicacao}',$animal->getMedicacao(),$item);
        $item = str_replace('{hora_alimentacao}',$animal->getHora_alimentacao(),$item);
        $item = str_replace('{raca}',$animal->getRaca(),$item);
        $item = str_replace('{SETOR_idSETOR}',$animal->getSetor(),$item);
        $item = str_replace('{ESPECIE_idESPECIE}',$animal->getEspecie(),$item);

        $itens .= $item;
    }
    $listagem = file_get_contents('listagem_animal.html');
    $listagem = str_replace('{itens}',$itens,$listagem);
    print($listagem);
     
?>