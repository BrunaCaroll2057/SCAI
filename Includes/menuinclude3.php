<?php

  include '../processologin/config.php';
  session_start();
  $user_id = $_SESSION['user_id'];

  if(!isset($user_id)){
    header('location:login.php');
  };

  if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
  };

?>

<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid" style="height: 70px;">
    <a class="navbar-brand" href="../logado.php">SCAI - Sistema de Cadastro de Animais</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="width: 70px; height: 37px;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 300px;">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../logado.php">Home</a>
            <hr>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sobrelogada.php">Sobre</a>
            <hr>
          </li>
            <li class="nav-item dropdown">
              <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cadastrar Animal
              </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../Animal/index.php" style="text-align: center;">Bovinos</a><hr></li>
                  <li><a class="dropdown-item" href="Animal/suinos.php" style="text-align: center;">Suínos</a><hr></li>
                  <li><a class="dropdown-item" href="Animal/ovinos.php" style="text-align: center;">Ovinos</a><hr></li>
                  <li><a class="dropdown-item" href="Animal/aves.php" style="text-align: center;">Aves</a><hr></li>
                  <li><a class="dropdown-item" href="Animal/coelhos.php" style="text-align: center;">Coelhos</a></li>
                </ul>
                <hr>
            </li>
              <li>
                <a class="dropdown-item" href="../home.php">Perfil</a>
                <hr>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a href="../home.php?logout=<?php echo $user_id; ?>" style="color: black;">Logout</a>
                <hr>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<br><br><br><br>
