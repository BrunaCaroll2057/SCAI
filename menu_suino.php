<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCAI - Cadastro de Suínos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome e Estilo personalizado -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilo.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"></script>

    <style>

        #tit_sobre {
            font-size: 2rem;
            font-weight: bold;
            color: #343a40;
            text-align: center;
            margin-top: 30px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .btn-card {
            background-color: #198754;
            color: white;
            transition: background-color 0.3s;
        }

        .btn-card:hover {
            background-color: #145c39;
            color: white;
        }

        .section-title {
            margin: 50px 0 20px;
            font-size: 1.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

<?php
  include __DIR__ . '/Includes/menuinclude.php';
?>

<!-- Título -->
<p id="tit_sobre">Cadastros de Suínos</p>

<!-- Cartões de Cadastro -->
<div class="container text-center">
    <div class="row justify-content-center">
        <!-- Cadastro 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Ciclo reprodutivo de cada porca</h5>
                    <a href="ReproducaoSuino/index.php" class="btn btn-card">Cadastrar</a>
                </div>
            </div>
        </div>

        <!-- Cadastro 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Acompanhamento da leitegada - nascimento ao abate</h5>
                    <a href="Acompanhamento/index.php" class="btn btn-card">Cadastrar</a>
                </div>
            </div>
        </div>

        <!-- Cadastro 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Informações da leitegada</h5>
                    <a href="Maternidade/form_cad_suino.php" class="btn btn-card">Cadastrar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Título da Lista -->
<p id="tit_sobre">Lista de Cadastros</p>

<!-- Cartões de Listagem -->
<div class="container text-center">
    <div class="row justify-content-center">
        <!-- Lista 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Ciclo reprodutivo de cada porca</h5>
                    <a href="ReproducaoSuino/lista_suino.php" class="btn btn-card">Acessar lista</a>
                </div>
            </div>
        </div>

        <!-- Lista 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Produção dos lotes de porca</h5>
                    <a href="Acompanhamento/listar_lotes.php" class="btn btn-card">Acessar lista</a>
                </div>
            </div>
        </div>

        <!-- Lista 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Informações da leitegada</h5>
                    <a href="Maternidade/form_cad_suino.php" class="btn btn-card">Acessar lista</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Rodapé -->
<?php include "Includes/rodapeinclude.php"; ?>

</body>
</html>