<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Cadastro de Animais</title>
</head>
<body>
    <?php
        include '../Includes/menuinclude3.php';
    ?>

    <h1 style="margin-left: 1%; margin-bottom: -10px;" id="tit_sobre">Manutenção de Animais</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend id="tit_sobre">Bovinos</legend>
            <br><br>
            <label for="id">Id:</label>
            <input type="text" name="id" value="{id}" readonly><br><br>

            <label for="genero">Gênero:</label>
            <input type="text" name="genero" value="{genero}"><br><br>

            <label for="dt_nascimento">Data de nascimento:</label>
            <input type="date" name="dt_nascimento" value="{dt_nascimento}"><br><br>

            <label for="ult_vermifugacao">Última vermifugação:</label>
            <input type="date" name="ult_vermifugacao" value="{ult_vermifugacao}">

            <label for="prox_vermifugacao">Próxima vermifugação:</label>
            <input type="date" name="prox_vermifugacao" value="{prox_vermifugacao}"><br><br>

            <label for="medicacao">Medicação:</label>
            <input type="text" name="medicacao" value="{medicacao}"><br><br>

            <label for="hora_alimentacao">Hora da alimentação:</label>
            <input type="text" name="hora_alimentacao" value="{hora_alimentacao}"><br><br>

            <label for="raca">Raça:</label>
            <input type="text" name="raca" value="{raca}">

            <label for="SETOR_idSETOR">Setor:</label>
            <input type="number" name="SETOR_idSETOR" value="{SETOR_idSETOR}">

            <label for="ESPECIE_idESPECIE">Espécie:</label>
            <input type="number" name="ESPECIE_idESPECIE" value="{ESPECIE_idESPECIE}">
            <br><br>

            <button type="submit" name="acao" value="salvar">Salvar</button>
            <button type="submit" name="acao" value="excluir">Excluir</button>
            <input  type="reset" value="Cancelar">
        </fieldset>
    </form>
</body>
</html>