<?php
require_once("Database.class.php");

class ProducaoLotes {
    private static $table = 'ProducaoLote';

    private $id;
    private $lote;
    private $nporca;
    private $nmacho;
    private $dt_cobertura;
    private $dt_provparto;
    private $dt_parto;
    private $vivos;
    private $natimorto;  // Padronizado sem "s" para consistência
    private $mumia;
    private $recebimento;
    private $transferencia;
    private $dt_desmama;
    private $ndesmamas;
    private $obs;

    // Construtor
    public function __construct($id = 0, $lote = 0, $nporca = 0, $nmacho = 0, $dt_cobertura = '', $dt_provparto = '',
                                $dt_parto = '', $vivos = 0, $natimorto = 0,
                                $mumia = 0, $recebimento = '', $transferencia = '', $dt_desmama = '', $ndesmamas = 0, $obs = '') {
        $this->id = $id;
        $this->lote = $lote;
        $this->nporca = $nporca;
        $this->nmacho = $nmacho;
        $this->dt_cobertura = $dt_cobertura;
        // Removido: $this->macho = $macho; (variável indefinida e duplicada)
        $this->dt_provparto = $dt_provparto;
        $this->dt_parto = $dt_parto;
        $this->vivos = $vivos;
        $this->natimorto = $natimorto;  // Corrigido: parâmetro é $natimorto, propriedade é $natimorto
        $this->mumia = $mumia;
        $this->recebimento = $recebimento;
        $this->transferencia = $transferencia;
        $this->dt_desmama = $dt_desmama;
        $this->ndesmamas = $ndesmamas;
        $this->obs = $obs;
    }

    // Setters (mantive validações básicas)
    public function setId($id) {
        if ($id < 0) throw new Exception("Erro, a ID deve ser maior que 0!");
        $this->id = $id;
    }
    public function setLote($lote) {
        if ($lote < 0) throw new Exception("Erro, o lote deve ser informado!");
        $this->lote = $lote;
    }
    public function getLote(): int {
        return (int)$this->lote;
    }
    public function setNporca($nporca) {
        if ($nporca < 0) throw new Exception("Erro, o N° da porca deve ser informado!");
        $this->nporca = $nporca;
    }
    public function setNmacho($nmacho) {
        if ($nmacho < 0) throw new Exception("Erro, o N° do Macho deve ser informado!");
        $this->nmacho = $nmacho;
    }
    public function setDt_cobertura($dt_cobertura) {
        if ($dt_cobertura == "") throw new Exception("Erro, a data de cobertura deve ser informada!");
        $this->dt_cobertura = $dt_cobertura;
    }
    public function setDt_provparto($dt_provparto) {
        if ($dt_provparto == "") throw new Exception("Erro, a data provável do parto deve ser informada!");
        $this->dt_provparto = $dt_provparto;
    }
    public function setDt_parto($dt_parto) {
        if ($dt_parto == "") throw new Exception("Erro, a data do parto deve ser informada!");
        $this->dt_parto = $dt_parto;
    }
    public function setVivos($vivos) {
        if ($vivos < 0) throw new Exception("Erro, a quantidade de vivos deve ser informado!");
        $this->vivos = $vivos;
    }
    public function setNatimorto($natimorto) {
        if ($natimorto < 0) throw new Exception("Erro, a quantidade de natimortos deve ser informado!");
        $this->natimorto = $natimorto;
    }
    public function setMumia($mumia) {
        if ($mumia < 0) throw new Exception("Erro, a quantidade de mumificados deve ser informada!");
        $this->mumia = $mumia;
    }
    public function setRecebimento($recebimento) {
        if ($recebimento == "") throw new Exception("Erro, a data de recebimento deve ser informada!");
        $this->recebimento = $recebimento;
    }
    public function setTransferencia($transferencia) {
        if ($transferencia == "") throw new Exception("Erro, a data de transferência deve ser informada!");
        $this->transferencia = $transferencia;
    }
    public function setDt_desmama($dt_desmama) {
        if ($dt_desmama == "") throw new Exception("Erro, a data de desmama deve ser informada!");
        $this->dt_desmama = $dt_desmama;
    }
    public function setNdesmamas($ndesmamas) {
        if ($ndesmamas === "") throw new Exception("Erro, o n° de desmamas deve ser informado!");
        $this->ndesmamas = $ndesmamas;
    }
    public function setObs($obs = '') {
        $this->obs = $obs;
    }
    private function dateOrNull($date) {
    return ($date === '' || $date === null) ? null : $date;
}


    // Getters
    public function getId(): int { return (int) $this->id; }
    public function getNporca(): int { return (int) $this->nporca; }
    public function getNmacho(): int { return (int) $this->nmacho; }  // Corrigido para minúsculo
    public function getDt_cobertura(): string { return (string) $this->dt_cobertura; }
    public function getDt_provparto(): string { return (string) $this->dt_provparto; }
    public function getDt_parto(): string { return (string) $this->dt_parto; }
    public function getVivos(): int { return (int) $this->vivos; }
    public function getNatimorto(): int { return (int) $this->natimorto; }  // Padronizado sem "s"
    public function getMumia(): int { return (int) $this->mumia; }
    public function getRecebimento(): string { return (string) $this->recebimento; }
    public function getTransferencia(): string { return (string) $this->transferencia; }
    public function getDt_desmama(): string { return (string) $this->dt_desmama; }
    public function getNdesmamas(): int { return (int) $this->ndesmamas; }
    public function getObs(): string { return (string) $this->obs; }

    // __toString (corrigido para consistência e removido $causa inexistente)
    public function __toString(): string {
        return "ProducaoLotes: {$this->id} - {$this->lote} - Nporca: {$this->nporca} - Nmacho: {$this->nmacho} - Data de cobertura: {$this->dt_cobertura} 
                                             - Data provável do parto: {$this->dt_provparto} - Data do parto: {$this->dt_parto} 
                                             - Vivos: {$this->vivos} - Natimorto: {$this->natimorto} 
                                             - Mumia: {$this->mumia} - Recebimento: {$this->recebimento} - Transferencia: {$this->transferencia} 
                                             - Data da desmama: {$this->dt_desmama} - N° de desmamas: {$this->ndesmamas}";
    }

    // Inserir
    public function inserir(): bool {
        $table = self::$table;
        $sql = "INSERT INTO `{$table}` (
            lote, nporca, nmacho, dt_cobertura, dt_provparto, dt_parto, vivos,
            natimorto, mumia, recebimento, transferencia, dt_desmama, ndesmamas, obs
        ) VALUES (
            :lote, :nporca, :nmacho, :dt_cobertura, :dt_provparto, :dt_parto, :vivos,
            :natimorto, :mumia, :recebimento, :transferencia, :dt_desmama, :ndesmamas, :obs
        )";
        $parametros = [
            ':lote' => $this->getLote(),
            ':nporca' => $this->getNporca(),
            ':nmacho' => $this->getNmacho(),
            ':dt_cobertura' => $this->dateOrNull($this->getDt_cobertura()),
            ':dt_provparto' => $this->dateOrNull($this->getDt_provparto()),
            ':dt_parto' => $this->dateOrNull($this->getDt_parto()),
            ':vivos' => $this->getVivos(),
            ':natimorto' => $this->getNatimorto(),
            ':mumia' => $this->getMumia(),
            ':recebimento' => $this->dateOrNull($this->getRecebimento()),
            ':transferencia' => $this->dateOrNull($this->getTransferencia()),
            ':dt_desmama' => $this->dateOrNull($this->getDt_desmama()),
            ':ndesmamas' => $this->getNdesmamas(),
            ':obs' => $this->getObs(),
        ];
        return Database::executar($sql, $parametros) === true;
    }

    // Alterar
    public function alterar(): bool {
        $table = self::$table;
        $sql = "UPDATE `{$table}`
                SET lote = :lote,
                    nporca = :nporca,
                    nmacho = :nmacho,
                    dt_cobertura = :dt_cobertura,
                    dt_provparto = :dt_provparto,
                    dt_parto = :dt_parto,
                    vivos = :vivos,
                    natimorto = :natimorto,
                    mumia = :mumia,
                    recebimento = :recebimento,
                    transferencia = :transferencia,
                    dt_desmama = :dt_desmama,
                    ndesmamas = :ndesmamas,
                    obs = :obs
                WHERE id = :id";
        $parametros = [
            ':id' => $this->getId(),
            ':lote' => $this->getLote(),
            ':nporca' => $this->getNporca(),
            ':nmacho' => $this->getNmacho(),
            ':dt_cobertura' => $this->dateOrNull($this->getDt_cobertura()),
            ':dt_provparto' => $this->dateOrNull($this->getDt_provparto()),
            ':dt_parto' => $this->dateOrNull($this->getDt_parto()),
            ':vivos' => $this->getVivos(),
            ':natimorto' => $this->getNatimorto(),
            ':mumia' => $this->getMumia(),
            ':recebimento' => $this->dateOrNull($this->getRecebimento()),
            ':transferencia' => $this->dateOrNull($this->getTransferencia()),
            ':dt_desmama' => $this->dateOrNull($this->getDt_desmama()),
            ':ndesmamas' => $this->getNdesmamas(),
            ':obs' => $this->getObs()
        ];
        return Database::executar($sql, $parametros) === true;
    }

    // Excluir
    public function excluir(): bool {
        $table = self::$table;
        $sql = "DELETE FROM `{$table}` WHERE id = :id";
        $parametros = [':id' => $this->getId()];
        return Database::executar($sql, $parametros) === true;
    }

    public static function listar($tipo = 0, $busca = ''): array {
        $table = self::$table;
        $sql = "SELECT id, lote, nporca, nmacho, dt_cobertura, dt_provparto, dt_parto, vivos, natimorto, mumia, recebimento, transferencia, dt_desmama, ndesmamas, obs FROM `{$table}`";  // Adicionado transferencia explicitamente
        $parametros = [];

        if ($tipo > 0 && $busca !== '') {
            switch ($tipo) {
                case 1:
                    $sql .= " WHERE id = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
                case 2:
                    $sql .= " WHERE lote LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
                case 3:
                    $sql .= " WHERE nporca LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
                case 4:
                    $sql .= " WHERE nmacho LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
                case 5:
                    $sql .= " WHERE dt_cobertura = :busca";
                    $parametros[':busca'] = $busca;
                    break;
                case 6:
                    $sql .= " WHERE dt_provparto = :busca";
                    $parametros[':busca'] = $busca;
                    break;
                case 7:
                    $sql .= " WHERE dt_parto = :busca";
                    $parametros[':busca'] = $busca;
                    break;
                case 8:
                    $sql .= " WHERE vivos = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
                case 9:
                    $sql .= " WHERE natimorto = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
                case 10:
                    $sql .= " WHERE mumia = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
                case 11:
                    $sql .= " WHERE recebimento LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
                case 12:
                    $sql .= " WHERE transferencia LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
                case 13:
                    $sql .= " WHERE dt_desmama = :busca";
                    $parametros[':busca'] = $busca;
                    break;
                case 14:
                    $sql .= " WHERE ndesmamas = :busca";
                    $parametros[':busca'] = (int)$busca;
                    break;
                case 15:
                    $sql .= " WHERE obs LIKE :busca";
                    $parametros[':busca'] = "%$busca%";
                    break;
            }
        }

        $stmt = Database::consultar($sql, $parametros);
        $objetos = [];

        if ($stmt !== false) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
                $objetos[] = new ProducaoLotes(
                    $row['id'] ?? 0,
                    $row['lote'] ?? 0,
                    $row['nporca'] ?? 0,
                    $row['nmacho'] ?? 0,
                    $row['dt_cobertura'] ?? '',
                    $row['dt_provparto'] ?? '',
                    $row['dt_parto'] ?? '',
                    $row['vivos'] ?? 0,
                    $row['natimorto'] ?? 0,
                    $row['mumia'] ?? 0,
                    $row['recebimento'] ?? '',
                    $row['transferencia'] ?? '',
                    $row['dt_desmama'] ?? '',
                    $row['ndesmamas'] ?? 0,
                    $row['obs'] ?? ''
                );
            }
        }

        return $objetos;
    }
}
?>