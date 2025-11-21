<?php

   session_start();

   include 'processologin/config.php';
   include 'processologin/User.class.php';

   $user = new User($conn);
   if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $image = $_FILES['image'];
      $result = $user->register($name, $email, $password, $cpassword, $image);
      if ($result === true) {
         header('Location: login.php');
         exit;
      } else {
         $message = $result; // array de erros
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
   </style>
</head>
<body>
   
<?php
    include 'Includes/menuinclude.php';
?>

<div class="form-container" style="background-color: white; margin-top: 50px; margin-bottom: 20px;">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Registro</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Digite o nome de usuário" class="box" required>
      <input type="email" name="email" placeholder="Digite o email" class="box" required>
      <input type="password" name="password" placeholder="Digite a senha" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirme a senha" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Registrar" class="btn">
      <p>Já possui registro? <a href="login.php">Logar</a></p>
   </form>

</div>

<?php
  include "Includes/rodapeinclude.php";
?>

</body>
</html>