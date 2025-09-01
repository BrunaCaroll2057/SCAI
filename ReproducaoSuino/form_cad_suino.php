<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Cadastro do ciclo reprodutivo de cada porca</title>
</head>
<body>
    <?php
        include '../Includes/menuinclude3.php';
    ?>

    <h1 style="margin-left: 1%; margin-bottom: -10px;" id="tit_sobre">Manutenção de Animais</h1>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend id="tit_sobre">Suínos</legend>
            <br><br>
            <label for="id">Id:</label>
            <input type="text" name="id" value="{id}" readonly><br><br>

            <label for="nporca">N° porca:</label>
            <input type="number" name="nporca" value="{nporca}">

            <label for="raca">Raça:</label>
            <input type="text" name="raca" value="{raca}">

            <label for="dt_nascimento">Data de Nascimneto:</label>
            <input type="date" name="dt_nascimento" value="{dt_nascimento}"><br><br>

            <label for="macho">Macho:</label>
            <input type="text" name="macho" value="{macho}"><br><br>

            <label for="dt_provparto">Data provável do parto:</label>
            <input type="date" name="dt_provparto" value="{dt_provparto}">

            <label for="dt_parto">Data do parto:</label>
            <input type="date" name="dt_parto" value="{dt_parto}"><br><br>

            <p class="pg">Nascidos:</p><br>
            <label for="vivos">Vivos:</label>
            <input type="number" name="vivos" value="{vivos}">

            <label for="natimortos">Natimortos:</label>
            <input type="number" name="natimortos" value="{natimortos}">

            <label for="mumificados">Mumificados:</label>
            <input type="number" name="mumificados" value="{mumificados}"><br><br>

            <p class="pg">Mortos na maternidade:</p><br>
            <label for="causa">Causas da morte:</label>
            <textarea name="causa" cols="30" rows="10" value="{causa}">Escreva aqui</textarea><br><br>

            <p class="pg">Desmama:</p><br>
            <label for="dt_desmama">Data da desmama:</label>
            <input type="date" name="dt_desmama" value="{dt_desmama}">

            <label for="ndesmamas">N° de desmamas:</label>
            <input type="number" name="ndesmamas" value="{ndesmamas}"><br><br>

            <button type="submit" name="acao" value="salvar">Salvar</button>
            <button type="submit" name="acao" value="excluir">Excluir</button>
            <input  type="reset" value="Cancelar">
        </fieldset>
    </form>
</body>
</html>