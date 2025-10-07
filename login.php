<?php

   session_start();
   include 'processologin/config.php';
   include 'processologin/User.class.php';

   $user = new User($conn);
   if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      if ($user->login($email, $password)) {
         header('Location: index.php');
         exit;
      } else {
         $message[] = 'Email e/ou senha incorretos!';
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>SCAI - Sistema de Coordenação de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="processologin/css/estilo.css">
   <style>
      body{
         background-color: #f8f9fa;
      }
      .footer {
        background-color: rgba(46, 125, 50, 0.9);
        color: #e6f2d9;
        padding: 20px 20px;
        text-align: center;
        font-size: 0.9rem;
        margin-top: 70px;
      }
   </style>
</head>
<body>

<?php
   include 'Includes/menuinclude.php';
?>
   
<div class="form-container" style="background-color: white; margin-top: -35px; margin-bottom: -90px;">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Login</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="Digite o email" class="box" required>
      <input type="password" name="password" placeholder="Digite a senha" class="box" required>
      <input type="submit" name="submit" value="Logar" class="btn">
      <p>Não possui conta? <a href="register.php">Registrar</a></p>
   </form>

</div>

<?php
  include "Includes/rodapeinclude.php";
?>

</body>
</html>