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
        if ($porca == "") throw new Exception("Erro, o N° de porcas deve ser informado!");
        $this->porca = $porca;
    }
    public function setLote($lote){
        if ($lote == "") throw new Exception("Erro, a lote deve ser informado!");
        $this->lote = $lote;
    }
    public function setVivos($vivos){
        if ($vivos < 0) throw new Exception("Erro, a data de nascimento deve ser informada!");
        $this->vivos = $vivos;
    }
    public function setMortos($mortos){
        if ($mortos == "") throw new Exception("Erro, o mortos deve ser informado!");
        $this->mortos = $mortos;
    }
    public function setMumia($mumia){
        if ($mumia == "") throw new Exception("Erro, a data provável do parto deve ser informada!");
        $this->mumia = $mumia;
    }
    public function setTmaternidade($tmaternidade){
        if ($tmaternidade == "") throw new Exception("Erro, a data do parto deve ser informada!");
        $this->tmaternidade = $tmaternidade;
    }
    public function setParto($parto){
        if ($parto === "") throw new Exception("Erro, a quantidade de parto deve ser informado!");
        $this->parto = $parto;
    }
    public function setDesmame($desmame){
        if ($desmame === "") throw new Exception("Erro, a quantidade de desmame deve ser informado!");
        $this->desmame = $desmame;
    }
    public function setScreche($screche){
        if ($screche === "") throw new Exception("Erro, a quantidade de screche deve ser informado!");
        $this->screche = $screche;
    }
    public function setVenda($venda){
        if ($venda == "") throw new Exception("Erro, a data de desmama deve ser informada!");
        $this->venda = $venda;
    }
    public function setNascimento($nascimento){
        if ($nascimento === "") throw new Exception("Erro, o n° de desmamas deve ser informado!");
        $this->nascimento = $nascimento;
    }
    public function setMossa($mossa){
        if ($mossa == "") throw new Exception("Erro, a data de desmama deve ser informada!");
        $this->mossa = $mossa;
    }
    public function setSexo($sexo){
        if ($sexo === "") throw new Exception("Erro, o n° de desmamas deve ser informado!");
        $this->sexo = $sexo;
    }
    public function setObservacao($observacao = ''){
        $this->observacao = $observacao;
    }
    
    // ------ getters ------
    public function getId(): int { return (int) $this->id; }
    public function getNporca(): string { return (string) $this->nporca; }
    public function getRaca(): string { return (string) $this->raca; }
    public function getDt_nascimento(): string { return (string) $this->dt_nascimento; }
    public function getMacho(): string { return (string) $this->macho; }
    public function getDt_provparto(): string { return (string) $this->dt_provparto; }
    public function getDt_parto(): string { return (string) $this->dt_parto; }
    public function getVivos(): int { return (int) $this->vivos; }
    public function getNatimortos(): int { return (int) $this->natimortos; }
    public function getMumificados(): int { return (int) $this->mumificados; }
    public function getCausa(): string { return (string) $this->causa; }
    public function getDt_desmama(): string { return (string) $this->dt_desmama; }
    public function getNdesmamas(): int { return (int) $this->ndesmamas; }

    public function __toString(): string {
        return "ReproducaoSuino: {$this->id} - {$this->nporca} - Raça: {$this->raca} - Data de nascimento: {$this->dt_nascimento} - Macho: {$this->macho} - Data provável do parto: {$this->dt_provparto} - Data do parto: {$this->dt_parto} - Vivos: {$this->vivos} - Natimortos: {$this->natimortos} - Mumificados: {$this->mumificados} - Causa: {$this->causa} - Data da desmama: {$this->dt_desmama} - N° de desmamas: {$this->ndesmamas}";
    }

    // inserir
    public function inserir(): bool {
        $table = self::$table;
        $sql = "INSERT INTO `{$table}` (
            nporca, raca, dt_nascimento, macho, dt_provparto, dt_parto, vivos,
            natimortos, mumificados, causa, dt_desmama, ndesmamas
        ) VALUES (
            :nporca, :raca, :dt_nascimento, :macho, :dt_provparto, :dt_parto, :vivos,
            :natimortos, :mumificados, :causa, :dt_desmama, :ndesmamas
        )";
        $parametros = [
            ':nporca' => $this->getNporca(),
            ':raca' => $this->getRaca(),
            ':dt_nascimento' => $this->getDt_nascimento(),
            ':macho' => $this->getMacho(),
            ':dt_provparto' => $this->getDt_provparto(),
            ':dt_parto' => $this->getDt_parto(),
            ':vivos' => $this->getVivos(),
            ':natimortos' => $this->getNatimortos(),
            ':mumificados' => $this->getMumificados(),
            ':causa' => $this->getCausa(),
            ':dt_desmama' => $this->getDt_desmama(),
            ':ndesmamas' => $this->getNdesmamas()
        ];
        return Database::executar($sql, $parametros) === true;
    }

    // alterar
    public function alterar(): bool {
        $table = self::$table;
        $sql = "UPDATE `{$table}`
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
        $parametros = [
            ':id' => $this->getId(),
            ':nporca' => $this->getNporca(),
            ':raca' => $this->getRaca(),
            ':dt_nascimento' => $this->getDt_nascimento(),
            ':macho' => $this->getMacho(),
            ':dt_provparto' => $this->getDt_provparto(),
            ':dt_parto' => $this->getDt_parto(),
            ':vivos' => $this->getVivos(),
            ':natimortos' => $this->getNatimortos(),
            ':mumificados' => $this->getMumificados(),
            ':causa' => $this->getCausa(),
            ':dt_desmama' => $this->getDt_desmama(),
            ':ndesmamas' => $this->getNdesmamas()
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
    
                case 2: // N° Porca
                    $sql .= " WHERE nporca LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 3: // Raça
                    $sql .= " WHERE raca LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 4: // Data de Nascimento
                    $sql .= " WHERE dt_nascimento = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 5: // Macho
                    $sql .= " WHERE macho LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 6: // Data provável do parto
                    $sql .= " WHERE dt_provparto = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 7: // Data do parto
                    $sql .= " WHERE dt_parto = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 8: // Vivos
                    $sql .= " WHERE vivos = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
    
                case 9: // Natimortos
                    $sql .= " WHERE natimortos = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
    
                case 10: // Mumificados
                    $sql .= " WHERE mumificados = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
    
                case 11: // Causa da morte
                    $sql .= " WHERE causa LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
    
                case 12: // Data da desmama
                    $sql .= " WHERE dt_desmama = :busca";
                    $parametros[':busca'] = $busca;
                    break;
    
                case 13: // N° de desmamas
                    $sql .= " WHERE ndesmamas = :busca";
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
                    $row['nporca'] ?? '',
                    $row['raca'] ?? '',
                    $row['dt_nascimento'] ?? '',
                    $row['macho'] ?? '',
                    $row['dt_provparto'] ?? '',
                    $row['dt_parto'] ?? '',
                    $row['vivos'] ?? 0,
                    $row['natimortos'] ?? 0,
                    $row['mumificados'] ?? 0,
                    $row['causa'] ?? '',
                    $row['dt_desmama'] ?? '',
                    $row['ndesmamas'] ?? 0
                );
            }
        }
    
        return $objetos;
    } 
}
?>
