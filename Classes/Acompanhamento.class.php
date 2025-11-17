<?php
require_once ("Database.class.php");

class Acompanhamento {
    private static $table = 'acompanhamento'; 

    private $id;
    private $porca;
    private $lote;
    private $vivos;
    private $mortos;
    private $mumia;
    private $tmaternidade;
    private $parto;
    private $desmame;
    private $screche;
    private $venda;
    private $nascimento;
    private $mossa;
    private $sexo;
    private $observacao;


    // construtor
    public function __construct($id = 0, $porca = '', $lote = '', $vivos = 0, $mortos = 0,
                                $mumia = 0, $tmaternidade = '', $parto = '', $desmame = '',
                                $screche = '', $venda = '', $nascimento = '', $mossa = '', $sexo = '', $observacao = '') {
        $this->id = $id;
        $this->porca = $porca;
        $this->lote = $lote;
        $this->vivos = $vivos;
        $this->mortos = $mortos;
        $this->mumia = $mumia;
        $this->tmaternidade = $tmaternidade;
        $this->parto = $parto;
        $this->desmame = $desmame;
        $this->screche = $screche;
        $this->venda = $venda;
        $this->nascimento = $nascimento;
        $this->mossa = $mossa;
        $this->sexo = $sexo;
        $this->observacao = $observacao;
    }

    // ------ setters (mantive as suas validações básicas) ------
    public function setId($id){
        if ($id < 0) throw new Exception("Erro, a ID deve ser maior que 0!");
        $this->id = $id;
    }
    public function setPorca($porca){
        if ($porca == "") throw new Exception("Erro, a porca deve ser informada!");
        $this->porca = $porca;
    }
    public function setLote($lote){
        if ($lote == "") throw new Exception("Erro, o lote deve ser informado!");
        $this->lote = $lote;
    }
    public function setVivos($vivos){
        if ($vivos < 0) throw new Exception("Erro, a quantidade de vivos deve ser informado!");
        $this->vivos = $vivos;
    }
    public function setMortos($mortos){
        if ($mortos < 0) throw new Exception("Erro, a quantidade de mortos deve ser informado!");
        $this->mortos = $mortos;
    }
    public function setMumia($mumia){
        if ($mumia < 0) throw new Exception("Erro, a quantidade de mumificados deve ser informado!");
        $this->mumia = $mumia;
    }
    public function setTmaternidade($tmaternidade){
        if ($tmaternidade == "") throw new Exception("Erro, a data de tranferência da maternidade deve ser informada!");
        $this->tmaternidade = $tmaternidade;
    }
    public function setParto($parto){
        if ($parto === "") throw new Exception("Erro, a data do parto deve ser informada!");
        $this->parto = $parto;
    }
    public function setDesmame($desmame){
        if ($desmame === "") throw new Exception("Erro, a data da desmame deve ser informada!");
        $this->desmame = $desmame;
    }
    public function setScreche($screche){
        if ($screche === "") throw new Exception("Erro, a data da saída da creche deve ser informada!");
        $this->screche = $screche;
    }
    public function setVenda($venda){
        if ($venda == "") throw new Exception("Erro, a data da venda deve ser informada!");
        $this->venda = $venda;
    }
    public function setNascimento($nascimento){
        if ($nascimento === "") throw new Exception("Erro,a data de nascimento deve ser informada!");
        $this->nascimento = $nascimento;
    }
    public function setMossa($mossa){
        if ($mossa == "") throw new Exception("Erro, a mossa deve ser informada!");
        $this->mossa = $mossa;
    }
    public function setSexo($sexo){
        if ($sexo === "") throw new Exception("Erro, o sexo deve ser informado!");
        $this->sexo = $sexo;
    }
    public function setObservacao($observacao = ''){
        $this->observacao = $observacao;
    }

        // ------ getters ------
        public function getId(): int { return (int) $this->id; }
        public function getPorca(): string { return (string) $this->porca; }
        public function getLote(): string { return (string) $this->lote; }
        public function getVivos(): string { return (string) $this->vivos; }
        public function getMortos(): string { return (string) $this->mortos; }
        public function getMumia(): string { return (string) $this->mumia; }
        public function getTmaternidade(): string { return (string) $this->tmaternidade; }
        public function getParto(): int { return (int) $this->parto; }
        public function getDesmame(): int { return (int) $this->desmame; }
        public function getScreche(): int { return (int) $this->screche; }
        public function getVenda(): string { return (string) $this->venda; }
        public function getNascimento(): string { return (string) $this->nascimento; }
        public function getMossa(): int { return (int) $this->mossa; }
        public function getSexo(): int { return (int) $this->sexo; }
        public function getObservacao(): int { return (int) $this->observacao; }

    public function __toString(): string {
        return "Acompanhamento: {$this->id} - {$this->porca} - Lote: {$this->lote} - Vivos {$this->vivos} - Mortos: {$this->mortos} - Mumia: {$this->mumia} 
                                            - Tmaternidade {$this->tmaternidade} - Parto: {$this->parto} - Desmame: {$this->desmame} 
                                            - Screche: {$this->screche} - Venda: {$this->venda} - Nascimento: {$this->nascimento} 
                                            - Mossa: {$this->mossa} - Sexo: {$this->sexo} - Observação: {$this->observacao}";
    }

   
    // inserir
    public function inserir(): bool {
        $table = self::$table;
        $sql = "INSERT INTO `{$table}` (
            porca, lote, vivos, mortos, mumia, tmaternidade, parto,
            desmame, screche, venda, nascimento, mossa, sexo, observacao
        ) VALUES (
            :porca, :lote, :vivos, :mortos, :mumia, :tmaternidade, :parto,
            :desmame, :screche, :venda, :nascimento, :mossa, :sexo, :obsevacao
        )";
        $parametros = [
            ':porca' => $this->getPorca(),
            ':lote' => $this->getLote(),
            ':vivos' => $this->getVivos(),
            ':mortos' => $this->getMortos(),
            ':mumia' => $this->getMumia(),
            ':tmaternidade' => $this->getTmaternidade(),
            ':parto' => $this->getVivos(),
            ':desmame' => $this->getDesmame(),
            ':screche' => $this->getMumificados(),
            ':venda' => $this->getVenda(),
            ':nascimento' => $this->getNascimento(),
            ':mossa' => $this->getMossa(),
            ':sexo' => $this->getSexo(),
            ':observacao' => $this->getObservacao()
        ];
        return Database::executar($sql, $parametros) === true;
    }

    // alterar
    public function alterar(): bool {
        $table = self::$table;
        $sql = "UPDATE `{$table}`
                SET porca = :porca,
                    lote = :lote,
                    vivos = :vivos,
                    mortos = :mortos,
                    mumia = :mumia,
                    tmaternidade = :tmaternidade,
                    parto = :parto,
                    desmame = :desmame,
                    screche = :screche,
                    venda = :venda,
                    mossa = :mossa,
                    sexo = :sexo, 
                    observacao = :observacao
                WHERE id = :id";
        $parametros = [
            ':id' => $this->getId(),
            ':porca' => $this->getPorca(),
            ':lote' => $this->getLote(),
            ':vivos' => $this->getVivos(),
            ':mortos' => $this->getMortos(),
            ':mumia' => $this->getMumia(),
            ':tmaternidade' => $this->getTmaternidade(),
            ':parto' => $this->getParto(),
            ':desmame' => $this->getDesmame(),
            ':screche' => $this->getScreche(),
            ':venda' => $this->getVenda(),
            ':mossa' => $this->getMossa(),
            ':sexo' => $this->getSexo(),
            ':observacao' => $this->getObservacao(),
        ];
        return Database::executar($sql, $parametros) === true;
    }

    // excluir
    public function excluir(): bool {
        $table = self::$table;
        $sql = "DELETE FROM `{$table}` WHERE id = :id";
        $parametros = [ ':id' => $this->getId() ];
        return Database::executar($sql, $parametros) === true;
    }

    // listar (método estático)
    public static function listar($tipo = 0, $busca = '') : array {
        $table = self::$table;
        $sql = "SELECT * FROM `{$table}`";
        $parametros = [];
    
        if ($tipo > 0 && $busca !== '') {
            switch ($tipo) {
                case 1: // ID
                    $sql .= " WHERE id = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
    
                case 2: // Porca
                    $sql .= " WHERE porca LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 3: // Lote
                    $sql .= " WHERE lote LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 4: // Vivos
                    $sql .= " WHERE vivos = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 5: // Mortos
                    $sql .= " WHERE mortos LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 6: // Mumia
                    $sql .= " WHERE mumia = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 7: // Tmaternidade
                    $sql .= " WHERE tmaternidade = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 8: // Parto
                    $sql .= " WHERE parto = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
    
                case 9: // Desmame
                    $sql .= " WHERE desmame = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
    
                case 10: // Screche
                    $sql .= " WHERE screche = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
    
                case 11: // Venda
                    $sql .= " WHERE venda LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 12: // Mossa
                    $sql .= " WHERE mossa = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 13: // Sexo
                    $sql .= " WHERE sexo = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;

                case 13: // Observação
                    $sql .= " WHERE observacao = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
            }
        }
    
        $stmt = Database::consultar($sql, $parametros);
        $objetos = [];
    
        if ($stmt !== false) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $objetos[] = new ReproducaoSuino(
                    $row['id'] ?? 0,
                    $row['porca'] ?? '',
                    $row['lote'] ?? 0,
                    $row['vivos'] ?? 0,
                    $row['mortos'] ?? 0,
                    $row['mumia'] ?? 0,
                    $row['tmaternidade'] ?? '',
                    $row['parto'] ?? 0,
                    $row['desmame'] ?? '',
                    $row['screche'] ?? '',
                    $row['venda'] ?? '',
                    $row['mossa'] ?? '',
                    $row['sexo'] ?? '',
                    $row['observacao'] ?? ''
                );
            }
        }
    
        return $objetos;
    } 
}
?>
