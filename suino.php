<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>
    <?php
        include 'Includes/menuinclude3.php';
    ?>
    <br><br>
        <button type="button" class="btn btn-light"> <a href="ReproducaoSuino/form_cad_suino.php">Cadastrar ciclo reprodutivo de cada porca</a></button>
        <br><br>

        <button type="button" class="btn btn-light"><a href="ProducaoSuino/form_cad_suino.php">Cadastrar produção dos lotes de porca</a></button>
        <br><br>

        <button type="button" class="btn btn-light"><a href="Maternidade/form_cad_suino.php">Cadastrar informações da leitegada</a></button>
        <br><br>

    <?php
    include "Includes/rodapeinclude.php";
    ?>

</body>
</html>