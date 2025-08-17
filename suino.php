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

      <p id="tit_sobre">Cadastros de Suínos</p>
        <br><br>

    <div class="container text-center">
      <div class="row">
        <div class="col">
            <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Ciclo reprodutivo de cada porca</h5>
                <a href="ReproducaoSuino/form_cad_suino.php" class="btn btn-card">Cadastrar</a>
            </div>
            </div>
        </div>

    <div class="col">
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <h5 class="card-title">Produção dos lotes de porca</h5>
                <a href="ProducaoSuino/form_cad_suino.php" class="btn btn-card">Cadastrar</a>
            </div>
            </div>
        </div>

    <div class="col">
        <div class="card" style="width: 20rem">
            <div class="card-body">
                <h5 class="card-title">Informações da leitegada</h5>
                <a href="Maternidade/form_cad_suino.php" class="btn btn-card">Cadastrar</a>
            </div>
            </div>
        </div>
    </div>
    </div>

    <?php
        include "Includes/rodapeinclude.php";
    ?>

</body>
</html>