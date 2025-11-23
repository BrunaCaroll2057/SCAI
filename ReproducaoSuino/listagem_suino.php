<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>
<body>

<style>
  /* Formulário */
  form fieldset {
    border: 2px solid #198754;
    border-radius: 8px;
    padding: 20px;
    width: 100%;
    max-width: 900px;
    background-color: #e8f5ee;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 40px;
  }

  form legend {
    font-weight: bold;
    color: #198754;
    font-size: 1.4rem;
    margin-bottom: 10px;
  }

  form label {
    margin-right: 10px;
    font-weight: 600;
  }

  form input[type="text"],
  form select {
    padding: 6px 12px;
    margin: 8px 12px 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
  }

  form button {
    background-color: #198754;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    font-size: 1rem;
    transition: background-color 0.3s ease;
  }

  form button:hover {
    background-color: #146c43;
  }

  h1 {
    color: #343a40;
    font-size: 2rem;
    margin-bottom: 25px;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    background-color: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
  }

  thead th {
      background-color: #198754 !important;
      color: white !important;
      padding: 12px 15px;
      text-align: center;
      font-weight: 600;
      box-shadow: inset -1px 0 0 #146c43;
      border-right: none;
  }

  thead th:last-child {
      box-shadow: none;
  }

  tbody td {
    padding: 10px 15px;
    text-align: center;
    color: #333;
    border-bottom: 1px solid #dee2e6;
  }

  tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tbody tr:hover {
    background-color: #e8f5ee;
  }

  .btn-voltar {
    display: inline-block;
    background-color: #198754;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-top: 30px;
    margin-bottom: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .btn-voltar:hover {
    background-color: #146c43;
    text-decoration: none;
  }

  form {
    display: flex;
    justify-content: center;
    width: 100%;
  }

</style>

<div class="container my-5">

    <form action="lista_suino.php" method="GET">
      <fieldset>
        <legend>Busca</legend>
        <label for="busca">Busca</label>
        <input type="text" name="busca" id="busca">
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo">
          <option value="0">Selecione</option>
          <option value="1">ID</option>
          <option value="2">N° Porca</option>
          <option value="3">Raça</option>
          <option value="4">Data de Nascimento</option>
          <option value="5">Macho</option>
          <option value="6">Data provável do parto</option>
          <option value="7">Data do parto</option>
          <option value="8">Vivos</option>
          <option value="9">Natimortos</option>
          <option value="10">Mumificados</option>
          <option value="11">Causa da morte</option>
          <option value="12">Data da desmama</option>
          <option value="13">N° de desmamas</option>
        </select>
        <button type="submit">Buscar</button>
      </fieldset>
    </form>

    <h1>Listagem de Animais</h1>
    <table class="table table-bordered table-striped mt-4">
      <thead>
        <tr>
          <th>Id</th>
          <th>N° Porca</th>
          <th>Raça</th>
          <th>Data de Nascimento</th>
          <th>Macho</th>
          <th>Data provável do parto</th>
          <th>Data do parto</th>
          <th>Vivos</th>
          <th>Natimortos</th>
          <th>Mumificados</th>
          <th>Causa da morte</th>
          <th>Data da desmama</th>
          <th>N° de desmamas</th>
        </tr>
      </thead>
      <tbody>
        <?= $itens ?>
      </tbody>
    </table>

    <a href="../menu_suino.php" class="btn btn-success mt-3">Voltar ao Menu</a>
</div>

</body>
</html>
