<?php
require_once ("Database.class.php");
class ReproducaoSuino{
    private $id;
    private $nporca;
    private $raca;
    private $dt_nascimento;
    private $macho;
    private $dt_provparto;
    private $dt_parto;
    private $vivos;
    private $natimortos;
    private $mumificados;
    private $causa;
    private $dt_desmama;
    private $ndesmamas;

    // construtor da classe
    public function __construct($id,$nporca,$raca,$dt_nascimento,$macho,$dt_provparto,$dt_parto,$vivos,$natimortos,$mumificados,$causa,$dt_desmama,$ndesmamas){
        $this->id = $id;
        $this->nporca = $nporca;
        $this->raca = $raca;
        $this->dt_nascimento = $dt_nascimento;
        $this->macho = $macho;
        $this->dt_provparto = $dt_provparto;
        $this->dt_parto = $dt_parto;
        $this->vivos = $vivos;
        $this->natimortos = $natimortos;
        $this->mumificados = $mumificados;
        $this->causa = $causa;
        $this->dt_desmama = $dt_desmama;
        $this->ndesmamas = $ndesmamas;
    }

        // cada atributo tem um método set para alterar seu valor
    public function setId($id){
        if ($id < 0)
            throw new Exception("Erro, a ID deve ser maior que 0!");
        else
            $this->id = $id;
    }

        // função / interface para aterar e ler
    public function setNporca($nporca){
        if ($nporca == "")
            throw new Exception("Erro, o N° de porcas deve ser informado!");
        else
            $this->nporca = $nporca;
    }

    public function setRaca($raca){
            if ($raca == "")
                throw new Exception("Erro, a raca deve ser informado!");
            else
                $this->raca = $raca;
    }

    public function setDt_nascimento($dt_nascimento){
            if ($dt_nascimento == "")
                throw new Exception("Erro, a data de nascimento deve ser informada!");
            else
                $this->$dt_nascimento = $dt_nascimento;
    }

    public function setMacho($macho){
            if ($macho == "")
                throw new Exception("Erro, o macho deve ser informado!");
            else
                $this->macho = $macho;
    }

    public function setDt_provparto($dt_provparto){
            if ($dt_provparto == "")
                throw new Exception("Erro, a data provável do parto deve ser informada!");
            else
                $this->dt_provparto = $dt_provparto;
    }

    public function setDt_parto($dt_parto){
            if ($dt_parto == "")
                throw new Exception("Erro, a data do parto deve ser informada!");
            else
                $this->dt_parto = $dt_parto;
    }

    public function setVivos($vivos){
            if ($vivos == "")
                throw new Exception("Erro, a quantidade de vivos deve ser informado!");
            else
                $this->vivos = $vivos;
    }

    public function setNatimortos($natimortos){
            if ($natimortos == "")
                throw new Exception("Erro, a quantidade de natimortos deve ser informado!");
            else
                $this->natimortos = $natimortos;
    }

    public function setMumificados($mumificados){
            if ($mumificados == "")
                throw new Exception("Erro, a quantidade de mumificados deve ser informado!");
            else
                $this->mumificados = $mumificados;
    }

    // Anexo pode ser em branco por isso o parâmetro é opcional
    public function setCausa($causa = ''){
        $this->$causa = $causa;
    }

    public function setDt_desmama($dt_desmama){
            if ($dt_desmama == "")
                throw new Exception("Erro, a a data de desmama deve ser informada!");
            else
                $this->dt_desmama = $dt_desmama;
    }

    public function setNdesmamas($ndesmamas){
            if ($ndesmamas == "")
                throw new Exception("Erro, o n° de desmamas deve ser informado!");
            else
                $this->ndesmamas = $ndesmamas;
    }

    public function getId(): int{
        return $this->id;
    }
    public function getNporca(): String{
        return $this->nporca;
    }
    public function getRaca(): String{
        return $this->raca;
    }
    public function getDt_nascimento(): String{
        return $this->dt_nascimento;
    }
        public function getMacho(): String{
        return $this->macho;
    }
        public function getDt_provparto(): String{
        return $this->dt_provparto;
    }
        public function getDt_parto(): String{
        return $this->dt_parto;
    }
        public function getVivos(): int{
        return $this->vivos;
    }
    public function getNatimortos(): int{
        return $this->natimortos;
    }
        public function getMumificados(): int{
        return $this->mumificados;
    }
        public function getCausa(): String{
        return $this->causa;
    }
    public function getDt_desmama(): String{
        return $this->causa;
    }
    public function getNdesmamas(): int{
        return $this->causa;
    }
    <td>{nporca}</td>
<td>{raca}</td>
<td>{dt_nascimento}</td>
<td>{macho}</td>
<td>{dt_provparto}</td>
<td>{dt_parto}</td>
<td>{vivos}</td>
<td>{natimortos}</td>
<td>{mumificados}</td>
<td>{causa}</td>
<td>{dt_desmama}</td>
<td>{ndesmamas}</td>

    // método mágico para imprimir uma atividade
    public function __toString():String{  
        $str = "Animal: $this->id - $this->nporca
                 - Raça: $this->raca
                 - Data de nascimento: $this->dt_nascimento
                 - Macho: $this->macho
                 - Data provável do parto: $this->dt_provparto
                 - Data do parto: $this->dt_parto
                 - Vivos: $this->vivos
                 - Natimortos: $this->natimortos
                 - Mumificados: $this->mumificados
                 - Causa: $this->causa
                 - Data da desmama: $this->dt_desmama
                 - N° de desmamas: $this->ndesmamas";
        return $str;
    }

    // insere uma animal no banco 
    public function inserir():Bool{
        // montar o sql/ query
        $sql = "INSERT INTO animal 
                    (genero, idade, dt_nascimento, ult_vermifugacao, prox_vermifugacao, medicacao, vivos, natimortos, mumificados, ESPECIE)
                    VALUES(:genero, :idade, :dt_nascimento, :ult_vermifugacao, :prox_vermifugacao, :medicacao, :vivos, :natimortos, :mumificados, :ESPECIE)";
        
        $parametros = array(':genero'=>$this->getGenero(),
                            ':idade'=>$this->getIdade(),
                            ':dt_nascimento'=>$this->getDt_nascimento(),
                            ':ult_vermifugacao'=>$this->getUlt_vermifugacao(),
                            ':prox_vermifugacao'=>$this->getProx_vermifugacao(),
                            ':medicacao'=>$this->getMedicacao(),
                            ':hora_alimentacao'=>$this->getHora_alimentacao(),
                            ':raca'=>$this->getRaca(),
                            ':SETOR_idSETOR'=>$this->getSetor(),
                            ':ESPECIE_idESPECIE'=>$this->getEspecie());
        
        return (Database::executar($sql, $parametros)== true);
    }

    public static function listar($tipo=0, $info=''):Array{
        $sql = "SELECT * FROM animal";
        switch ($tipo){
            case 0: break;
            case 1: $sql .= " WHERE idANIMAL = :info ORDER BY idANIMAL"; break; // filtro por ID
            case 2: $sql .= " WHERE genero like :info ORDER BY genero"; $info = '%'.$info.'%'; break; // filtro por gênero
            case 3: $sql .= " WHERE idade like :info ORDER BY idade"; $info = '%'.$info.'%'; break; // filtro por idade
            case 4: $sql .= " WHERE dt_nascimento like :info ORDER BY dt_nascimento"; $info = '%'.$info.'%'; break; // filtro por data de nascimento
            case 5: $sql .= " WHERE ult_vermifugacao like :info ORDER BY ult_vermifugacao"; $info = '%'.$info.'%'; break; // filtro por ultima vermifugação
            case 6: $sql .= " WHERE prox_vermifugacao like :info ORDER BY prox_vermifugacao"; $info = '%'.$info.'%'; break; // filtro por próxima vermifugação
            case 7: $sql .= " WHERE medicacao like :info ORDER BY medicacao"; $info = '%'.$info.'%'; break; // filtro por medicação
            case 8: $sql .= " WHERE hora_alimentacao like :info ORDER BY hora_alimentacao"; $info = '%'.$info.'%'; break; // filtro por hora da alimentação
            case 9: $sql .= " WHERE raca like :info ORDER BY raca"; $info = '%'.$info.'%'; break; // filtro por raça
            case 10: $sql .= " WHERE SETOR_idSETOR like :info ORDER BY SETOR_idSETOR"; $info = '%'.$info.'%'; break; // filtro por setor
            case 11: $sql .= " WHERE ESPECIE_idESPECIE like :info ORDER BY ESPECIE_idESPECIE"; $info = '%'.$info.'%'; break; // filtro por espécie

        }
        $parametros = array();
        if ($tipo > 0)
            $parametros = [':info'=>$info];

        $comando = Database::executar($sql, $parametros);
        //$resultado = $comando->fetchAll();
        $animais = [];
        while ($registro = $comando->fetch()){
            $animal = new Animal($registro['idANIMAL'],$registro['GENERO'],$registro['IDADE'],$registro['DT_NASCIMENTO'],$registro['ULT_VERMIFUGACAO'],$registro['PROX_VERMIFUGACAO'],$registro['MEDICACAO'],$registro['HORA_ALIMENTACAO'],$registro['RACA'],$registro['SETOR_idSETOR'],$registro['ESPECIE_idESPECIE']);
            array_push($animais,$animal);
        }
        return $animais;
    }

    public function alterar():Bool{       
       $sql = "UPDATE animal
                  SET genero = :genero, 
                      idade = :idade,
                      dt_nascimento = :dt_nascimento,
                      ult_vermifugacao = :ult_vermifugacao,
                      prox_vermifugacao = :prox_vermifugacao,
                      medicacao = :medicacao,
                      hora_alimentacao = :hora_alimentacao,
                      raca = :raca,
                      SETOR_idSETOR = :SETOR_idSETOR,
                      ESPECIE_idESPECIE = :ESPECIE_idESPECIE
                WHERE idANIMAL = :idANIMAL";
         $parametros = array(':idANIMAL'=>$this->getId(),
                        ':genero'=>$this->getGenero(),
                        ':idade'=>$this->getIdade(),
                        ':dt_nascimento'=>$this->getDt_nascimento(),
                        ':ult_vermifugacao'=>$this->getUlt_vermifugacao(),
                        ':prox_vermifugacao'=>$this->getProx_vermifugacao(),
                        ':medicacao'=>$this->getMedicacao(),
                        ':hora_alimentacao'=>$this->getHora_alimentacao(),
                        ':raca'=>$this->getRaca(),
                        ':SETOR_idSETOR'=>$this->getSetor(),
                        ':ESPECIE_idESPECIE'=>$this->getEspecie());
        return Database::executar($sql, $parametros) == true;
    }

    public function excluir():Bool{
        $sql = "DELETE FROM animal
                      WHERE idANIMAL = :idANIMAL";
        $parametros = array(':idANIMAL'=>$this->getId());
        return Database::executar($sql, $parametros) == true;
     }
}

?>