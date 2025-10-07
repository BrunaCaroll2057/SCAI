<?php
  include_once __DIR__ . '/../config/config.inc.php';
?>

<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid" style="height: 70px;">
    <a class="navbar-brand"  href="<?=HOME?>index.php">
      SCAI - Sistema de Coordenação de Animais do Instituto
    </a>  
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

<?php
  if (isset($_SESSION['user_id'])) {
      $tipo = $_SESSION['user_tipo'] ?? '';

      if ($tipo === 'admin') {
          echo '
            <li class="nav-item"><hr><a class="nav-link active" href="'.HOME.'index.php">Home</a><hr></li>
            <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a><hr></li>
            
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastrar Animal</a>
              <ul class="dropdown-menu" style="text-align: center;">
                <li><a class="dropdown-item" href="/scaii/menu_bovino.php">Bovinos</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_suino.php">Suínos</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_ovino.php">Ovinos</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_ave.php">Aves</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_coelho.php">Coelhos</a></li>
              </ul>
              <hr>
            </li>
              
            <li class="nav-item"><a class="nav-link" href="home.php">Perfil</a><hr></li>
            <li class="nav-item"><a class="nav-link" href="aprovacoes.php">Aprovar Cadastros</a><hr></li>
            <li class="nav-item"><a class="nav-link" href="home.php?logout=' . $_SESSION['user_id'] . '">Logout</a><hr></li>
          ';
      } elseif ($tipo === 'funcionario') {
          echo '
            <li class="nav-item"><hr><a class="nav-link active" href="index.php">Home</a><hr></li>
            <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a><hr></li>
            
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cadastrar Animal</a>
              <ul class="dropdown-menu" style="text-align: center;">
                <li><a class="dropdown-item" href="/scaii/menu_bovino.php">Bovinos</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_suino.php">Suínos</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_ovino.php">Ovinos</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_ave.php">Aves</a><hr></li>
                <li><a class="dropdown-item" href="/scaii/menu_coelho.php">Coelhos</a></li>
              </ul>
              <hr>
            </li>
            
            <li class="nav-item"><a class="nav-link" href="home.php">Perfil</a><hr></li>
            <li class="nav-item"><a class="nav-link" href="home.php?logout=' . $_SESSION['user_id'] . '">Logout</a><hr></li>
          ';
      } else {
          // Usuários comuns não logados: não exibe menu (ou pode exibir menu público)
          echo '
            <li class="nav-item"><hr><a class="nav-link active" href="index.php">Home</a><hr></li>
            <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a><hr></li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opções</a>
              <ul class="dropdown-menu" style="text-align: center;">
                <li><a class="dropdown-item" href="login.php">Logar</a><hr></li>
                <li><a class="dropdown-item" href="register.php">Cadastrar</a></li>
              </ul>
              <hr>
            </li>
          ';
      }
  } else {
      // Menu público para visitantes não logados
      echo '
        <li class="nav-item"><hr><a class="nav-link active" href="index.php">Home</a><hr></li>
        <li class="nav-item"><a class="nav-link" href="sobre.php">Sobre</a><hr></li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Opções</a>
          <ul class="dropdown-menu" style="text-align: center;">
            <li><a class="dropdown-item" href="login.php">Logar</a><hr></li>
            <li><a class="dropdown-item" href="register.php">Cadastrar</a></li>
          </ul>
          <hr>
        </li>
      ';
  }
?>
        </ul>
      </div>
    </div>
  </div>
</nav>

<br><br><br><br>