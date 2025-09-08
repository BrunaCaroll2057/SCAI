<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      include __DIR__ . '/Includes/menuinclude.php';
    ?>

  <div id="carousel" class="carousel slide" data-ride="carousel" style="margin-top: 50px;">

  <!--   Bullets do carrossel, se aumentar uma imagem, aumente um li e acrescento o próximo número -->
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1"></li>
    <li data-target="#carousel" data-slide-to="2"></li>
    <li data-target="#carousel" data-slide-to="3"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/ifc.png">
      <div class="titulo">
    </div>
    </div>

    <div class="carousel-item">
      <img src="img/prediosede.png">
      <div class="titulo">
    </div>
    </div>

    <div class="carousel-item">
      <img src="img/entrada2.png">
      <div class="titulo">
    </div>
    </div>


  <div class="carousel-item">
      <img src="img/fetec.png">
      <div class="titulo">
    </div>
    </div>

  </div> <!-- Fecha elementos dentro do carrossel -->

  <!--   Controladores | Botões -->
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only"> Previous </span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only"> Next </span>
  </a> 
  </div> <!-- Fim do carrossel -->

    <br><br>
  <!-- Começo dos cards -->

  <p id="tit_sobre">Saiba mais:</p>

  <div class="container text-center">
    <div class="row">
      <div class="col">
        <div class="card bg-success-subtle text-dark" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Quer estudar no IFC?</h5>
            <p class="card-text">Se você tem interesse em estudar no IFC, acesse o link abaixo.</p>
            <a href="https://ifc.edu.br/perfil/servidor" class="card-link text-success-emphasis">Ingresso de estudantes</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card bg-success-subtle text-dark" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">É servidor do IFC?</h5>
            <p class="card-text">Acesse o link abaixo para acessar a página dos servidores.</p>
            <a href="https://ingresso.ifc.edu.br/?_gl=1%2Alk2zg3%2A_ga%2AMjI5Nzc1NTQ5LjE3MjUwNTY2OTE.%2A_ga_FM2DQDNX9M%2AczE3NTQ2MDc1MzkkbzEkZzAkdDE3NTQ2MDc1MzkkajYwJGwwJGgw" class="card-link text-success-emphasis">Página dos servidores</a>
          </div>
        </div>

      </div>
      <div class="col">
        <div class="card bg-success-subtle text-dark" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Já é estudante do IFC?</h5>
            <p class="card-text">Acesse o link abaixo para acessar a página dos estudantes.</p>
            <a href="https://ensino.ifc.edu.br/?_gl=1%2An8ozd9%2A_ga%2AMjI5Nzc1NTQ5LjE3MjUwNTY2OTE.%2A_ga_FM2DQDNX9M%2AczE3NTQ2MDc1MzkkbzEkZzEkdDE3NTQ2MDgyMTgkajYwJGwwJGgw" class="card-link text-success-emphasis">Página dos estudantes</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<p id="tit_sobre">Confira também:</p>

<br>
<div class="container text-center">
  <div class="row align-items-center">
    <div class="col">
      <div class="column">
        <div class="card" style="width: 18rem;">
          <a href="https://ifc.edu.br/" target="_blank" rel="noopener noreferrer"><img src="img/if.png" class="card-img-top" alt="..."></a>
            <div class="card-body">
              <p class="card-text">Acesse o site oficial do Instituto Federal Catarinense.</p><br>
            </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <a href="praticas.php"><img src="img/animal.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <p class="card-text">Acesse registros de aulas práticas do curso de agropecuária, realizadas na Unidade Sede.</p>
          </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <a href="registros.php"><img src="img/instituo.png" class="card-img-top" alt="..."></a>
          <div class="card-body">
            <p class="card-text">Acesse registros do Instituto, na Unidade Sede, feitas por estudantes.</p>
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

