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
                $this->dt_nascimento = $dt_nascimento;
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
                $this->causa = $causa;
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

    public function getId(): int {
        return (int) $this->id;
    }    
    public function getNporca(): string {
        return (string) $this->nporca;
    }   
    public function getRaca(): string{
        return (string) $this->raca;
    }
    public function getDt_nascimento(): string{
        return (string) $this->dt_nascimento;
    }
    public function getMacho(): string{
        return (string) $this->macho;
    }
    public function getDt_provparto(): string{
        return (string) $this->dt_provparto;
    }
        public function getDt_parto(): string{
        return (string) $this->dt_parto;
    }
    public function getVivos(): int {
        return (int) $this->vivos;
    } 
    public function getNatimortos(): int {
        return (int) $this->natimortos;
    }
        public function getMumificados(): int{
        return (int) $this->mumificados;
    }
        public function getCausa(): string{
        return (string) $this->causa;
    }
    public function getDt_desmama(): string{
        return (string) $this->dt_desmama;
    }
    public function getNdesmamas(): int{
        return (int) $this->ndesmamas;
    }

    // método mágico para imprimir uma atividade
    public function __toString():string{  
        $str = "ReproducaoSuino: $this->id - $this->nporca
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
    $sql = "INSERT INTO reproducaosuino 
                (NPORCA, RACA, DT_NASCIMENTO, MACHO, DT_PROVPARTO, DT_PARTO, VIVOS, NATIMORTOS, MUMIFICADOS, CAUSA, DT_DESMAMA, NDESMAMAS)
            VALUES(:nporca, :raca, :dt_nascimento, :macho, :dt_provparto, :dt_parto, :vivos, :natimortos, :mumificados, :causa, :dt_desmama, :ndesmamas)";
        //criar uma table no banco de dados com o nome "reproducaosuino"
        $parametros = array(':nporca'=>$this->getNporca(),
                            ':raca'=>$this->getRaca(),
                            ':dt_nascimento'=>$this->getDt_nascimento(),
                            ':macho'=>$this->getMacho(),
                            ':dt_provparto'=>$this->getDt_provparto(),
                            ':dt_parto'=>$this->getDt_parto(),
                            ':vivos'=>$this->getVivos(),
                            ':natimortos'=>$this->getNatimortos(),
                            ':mumificados'=>$this->getMumificados(),
                            ':causa'=>$this->getCausa(),
                            ':dt_desmama'=>$this->getDt_desmama(),
                            ':ndesmamas'=>$this->getNdesmamas());
              
        return (Database::executar($sql, $parametros)== true);
    }

    public static function listar($tipo=0, $info=''):Array{
        $sql = "SELECT * FROM reproducaosuino";
        switch ($tipo){
            case 0: break;
            case 1: $sql .= " WHERE id = :info ORDER BY id"; break; // filtro por ID
            case 2: $sql .= " WHERE nporca like :info ORDER BY nporca"; $info = '%'.$info.'%'; break; // filtro por n° porca
            case 3: $sql .= " WHERE raca like :info ORDER BY raca"; $info = '%'.$info.'%'; break; // filtro por raca
            case 4: $sql .= " WHERE dt_nascimento like :info ORDER BY dt_nascimento"; $info = '%'.$info.'%'; break; // filtro por data de nascimento
            case 5: $sql .= " WHERE macho like :info ORDER BY macho"; $info = '%'.$info.'%'; break; // filtro por macho
            case 6: $sql .= " WHERE dt_provparto like :info ORDER BY dt_provparto"; $info = '%'.$info.'%'; break; // filtro por data provável do parto
            case 7: $sql .= " WHERE dt_parto like :info ORDER BY dt_parto"; $info = '%'.$info.'%'; break; // filtro por medicação
            case 8: $sql .= " WHERE vivos like :info ORDER BY vivos"; $info = '%'.$info.'%'; break; // filtro por hora da alimentação
            case 9: $sql .= " WHERE natimortos like :info ORDER BY natimortos"; $info = '%'.$info.'%'; break; // filtro por raça
            case 10: $sql .= " WHERE mumificados like :info ORDER BY mumificados"; $info = '%'.$info.'%'; break; // filtro por setor
            case 11: $sql .= " WHERE causa like :info ORDER BY causa"; $info = '%'.$info.'%'; break; // filtro por espécie
            case 12: $sql .= " WHERE dt_desmama like :info ORDER BY dt_desmama"; $info = '%'.$info.'%'; break; // filtro por espécie
            case 13: $sql .= " WHERE ndesmamas like :info ORDER BY ndesmamas"; $info = '%'.$info.'%'; break; // filtro por espécie
        }
        $parametros = array();
        if ($tipo > 0)
            $parametros = [':info'=>$info];

        $comando = Database::consultar($sql, $parametros);
        //$resultado = $comando->fetchAll();
        $suinos = [];
        while ($registro = $comando->fetch()){
            $animal = new ReproducaoSuino($registro['id'],$registro['nporca'],$registro['raca'],$registro['dt_nascimento'],$registro['macho'],$registro['dt_provparto'],$registro['dt_parto'],$registro['vivos'],$registro['natimortos'],$registro['mumificados'],$registro['causa'],$registro['dt_desmama'],$registro['ndesmamas']);
            array_push($suinos, $animal);        }
        return $suinos;
    }

    public function alterar():Bool{       
       $sql = "UPDATE reproducaosuino
                  SET nporca = :nporca, 
                      raca = :raca,
                      dt_nascimento = :dt_nascimento,
                      macho = :macho,
                      dt_provparto = :dt_provparto,
                      dt_parto = :dt_parto,
                      vivos = :vivos,
                      natimortos = :natimortos,
                      mumificados = :mumificados,
                      causa = :causa,
                      dt_desmama = :dt_desmama,
                      ndesmamas = :ndesmamas

                WHERE id = :id";
         $parametros = array(':id'=>$this->getId(),
                        ':nporca'=>$this->getNporca(),
                        ':raca'=>$this->getRaca(),
                        ':dt_nascimento'=>$this->getDt_nascimento(),
                        ':macho'=>$this->getMacho(),
                        ':dt_provparto'=>$this->getDt_provparto(),
                        ':dt_parto'=>$this->getDt_parto(),
                        ':vivos'=>$this->getVivos(),
                        ':natimortos'=>$this->getNatimortos(),
                        ':mumificados'=>$this->getMumificados(),
                        ':causa'=>$this->getCausa(),
                        ':dt_desmama'=>$this->getDt_desmama(),
                        ':ndesmamas'=>$this->getNdesmamas());
        return Database::executar($sql, $parametros) == true;
    }

    public function excluir():Bool{
        $sql = "DELETE FROM reproducaosuino
                      WHERE id = :id";
        $parametros = array(':id'=>$this->getId());
        return Database::executar($sql, $parametros) == true;
     }
}

?>