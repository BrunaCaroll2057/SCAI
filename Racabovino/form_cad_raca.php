<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Raça de Bovinos</title>
</head>
<body>
    <h1>Manutenção de Bovinos</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Formulário</legend>
            <label for="id">Id:</label>
            <input type="text" name="id" readonly value={id}>
            <label for="nome">Nome:</label>
            <input type="text" name="nome"  value={nome}>
      
            <button type="submit" name="acao" value="salvar">Salvar</button>
            <button type="submit" name="acao" value="excluir">Excluir</button>
            <input type="reset" value="Cancelar">
        </fieldset>
    </form>
</body>
</html>