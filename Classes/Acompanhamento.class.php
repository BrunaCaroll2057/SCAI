<?php
require_once ("Database.class.php");

class ReproducaoSuino {
    private static $table = 'reproducaoSuino'; // ajuste aqui se o nome real da tabela for outro

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

    // construtor
    public function __construct($id = 0, $nporca = '', $raca = '', $dt_nascimento = '', $macho = '',
                                $dt_provparto = '', $dt_parto = '', $vivos = 0, $natimortos = 0,
                                $mumificados = 0, $causa = '', $dt_desmama = '', $ndesmamas = 0) {
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

    // ------ setters (mantive as suas validações básicas) ------
    public function setId($id){
        if ($id < 0) throw new Exception("Erro, a ID deve ser maior que 0!");
        $this->id = $id;
    }
    public function setNporca($nporca){
        if ($nporca == "") throw new Exception("Erro, o N° de porcas deve ser informado!");
        $this->nporca = $nporca;
    }
    public function setRaca($raca){
        if ($raca == "") throw new Exception("Erro, a raca deve ser informado!");
        $this->raca = $raca;
    }
    public function setDt_nascimento($dt_nascimento){
        if ($dt_nascimento == "") throw new Exception("Erro, a data de nascimento deve ser informada!");
        $this->dt_nascimento = $dt_nascimento;
    }
    public function setMacho($macho){
        if ($macho == "") throw new Exception("Erro, o macho deve ser informado!");
        $this->macho = $macho;
    }
    public function setDt_provparto($dt_provparto){
        if ($dt_provparto == "") throw new Exception("Erro, a data provável do parto deve ser informada!");
        $this->dt_provparto = $dt_provparto;
    }
    public function setDt_parto($dt_parto){
        if ($dt_parto == "") throw new Exception("Erro, a data do parto deve ser informada!");
        $this->dt_parto = $dt_parto;
    }
    public function setVivos($vivos){
        if ($vivos === "") throw new Exception("Erro, a quantidade de vivos deve ser informado!");
        $this->vivos = $vivos;
    }
    public function setNatimortos($natimortos){
        if ($natimortos === "") throw new Exception("Erro, a quantidade de natimortos deve ser informado!");
        $this->natimortos = $natimortos;
    }
    public function setMumificados($mumificados){
        if ($mumificados === "") throw new Exception("Erro, a quantidade de mumificados deve ser informado!");
        $this->mumificados = $mumificados;
    }
    public function setCausa($causa = ''){
        $this->causa = $causa;
    }
    public function setDt_desmama($dt_desmama){
        if ($dt_desmama == "") throw new Exception("Erro, a data de desmama deve ser informada!");
        $this->dt_desmama = $dt_desmama;
    }
    public function setNdesmamas($ndesmamas){
        if ($ndesmamas === "") throw new Exception("Erro, o n° de desmamas deve ser informado!");
        $this->ndesmamas = $ndesmamas;
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
