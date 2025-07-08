<?php

require_once "Database.class.php";
require_once ("Formulario.interface.php");

class Vacina implements Formulario{

    private $id;
    private $nome;

    public function __construct($id, $nome){
        $this->setId($id);
        $this->setNome($nome);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getId(): int {return $this->id;}
    public function getNome(): String {return $this->nome;}

    //completar com os demais métodos

    public function inserir():Bool{
        // montar o sql/ query
        $sql = "INSERT INTO vacina 
                    (nome)
                    VALUES(:nome)";
        
        $parametros = array(':nome'=>$this->getNome());
        
        return Database::executar($sql, $parametros) == true;
    }

    public static function listar($tipo=0, $info=''):Array{
        $sql = "SELECT * FROM vacina";
        switch ($tipo){
            case 0: break;
            case 1: $sql .= " WHERE id = :info ORDER BY id"; break; // filtro por ID
            case 2: $sql .= " WHERE nome like :info ORDER BY nome"; $info = '%'.$info.'%'; break; // filtro por descrição
        }
        $parametros = array();
        if ($tipo > 0)
            $parametros = [':info'=>$info];

        $comando = Database::executar($sql, $parametros);
        $vacinas = [];
        while ($registro = $comando->fetch()){
            $vacina = new Vacina($registro['id'],$registro['nome']);
            array_push($vacinas,$vacina);
        }
        return $vacinas;
    }

    public function alterar():Bool{       
       $sql = "UPDATE vacina
                  SET nome = :nome                     
                WHERE id = :id";
         $parametros = array(':id'=>$this->getId(),
                        ':nome'=>$this->getNome());
        return Database::executar($sql, $parametros) == true;
    }

    public function excluir():Bool{
        $sql = "DELETE FROM vacina
                      WHERE id = :id";
        $parametros = array(':id'=>$this->getid());
        return Database::executar($sql, $parametros) == true;
     }
}

?>