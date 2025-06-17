<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>

</head>
<body>

    <?php
        include 'menuinclude2.php'
    ?>

<br><br><br>

<div id="carousel" class="carousel slide" data-ride="carousel">

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

<p class="pg">Confira também: </p>

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
  include "rodapeinclude.php"
?>
</body>
</html>

