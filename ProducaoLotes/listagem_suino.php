<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>SCAI - Acompanhamento Produtivo dos Lotes</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/tabela_suinos.css">
</head>

<body>

<div class="container-fluid my-5">

    <!-- FORMULÁRIO DE BUSCA -->
    <form action="lista_suino.php" method="GET" class="d-flex justify-content-center">
        <fieldset style="border:2px solid #198754; border-radius:8px; padding:20px; background:#e8f5ee; max-width:900px;">
            <legend style="color:#198754; font-weight:bold;">Busca</legend>

            <label for="busca" class="me-2 fw-semibold">Busca</label>
            <input type="text" name="busca" id="busca" class="form-control d-inline-block" 
                   style="width:auto; display:inline-block;">

            <label for="tipo" class="ms-3 me-2 fw-semibold">Tipo</label>
            <select name="tipo" id="tipo" class="form-select d-inline-block" style="width:auto;">
                <option value="0">Selecione</option>
                <option value="1">ID</option>
                <option value="2">N° Porca</option>
                <option value="3">N° Macho</option>
                <option value="4">Data de cobertura</option>
                <option value="5">Data provável do parto</option>
                <option value="6">Data do parto</option>
                <option value="7">Vivos</option>
                <option value="8">Natimortos</option>
                <option value="9">Mumificados</option>
                <option value="10">Recebimento</option>
                <option value="11">Transferência</option>
                <option value="12">Data da desmama</option>
                <option value="13">N° de desmamas</option>
            </select>

            <button type="submit" class="btn btn-success ms-3">Buscar</button>
        </fieldset>
    </form>

    <!-- TÍTULO -->
    <h1 class="mt-5">Acompanhamento produtivo dos lotes</h1>
  <br>
    <!-- TABELA -->
    <div class="tabela-wrapper">
        <table class="table tabela-suino table-bordered table-striped mt-4">
        <thead class="thead-verde">
            <tr>
              <th class="col-id">ID</th>
              <th class="col-nporca">N° Porca</th>
              <th class="col-nmacho">N° Macho</th>
              <th class="col-cobertura">Data de Cobertura</th>
              <th class="col-provparto">Data Prov. Parto</th>
              <th class="col-parto">Data Parto</th>
              <th class="col-vivos">Vivos</th>
              <th class="col-natimortos">Natimortos</th>
              <th class="col-mumificados">Mumificados</th>
              <th class="col-recebimento">Recebimento</th>
              <th class="col-transferencia">Transferência</th>
              <th class="col-dtdesmama">Data Desmama</th>
              <th class="col-ndesmama">N° Desmamas</th>
              <th class="col-obs">Observações</th>
            </tr>
        </thead>
        <tbody>
            <?= $itens ?>
        </tbody>
    </table>
    </div>
    <br>
    <a href="../menu_suino.php" class="btn btn-success mt-3" style="margin-left: 30px;">Voltar ao Menu</a>

</div>

</body>
</html>
