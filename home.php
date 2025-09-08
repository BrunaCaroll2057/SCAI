<?php

include 'processologin/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
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
    <title>SCAI-Sistema de Cadastro de Animais do Instituto</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="JS/js.js"> </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="processologin/css/estilo.css">

</head>
<body>

<?php
    include 'Includes/menuinclude2.php';
?>
   
<div class="container" style="background-color: white;">
   
   <div class="profile" style="background-color: white; margin-top: -2px; margin-bottom: -10px;">   
      <h3 style="font-size: 40px;">Perfil</h3>
      <br>

      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="processologin/uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      
      <h3><?php echo $fetch['name']; ?></h3>
      <h3><?php echo $fetch['email']; ?></h3>
      <hr>

      <a href="update_profile.php" class="btn">Atualizar informações</a>
      <a href="index.php" class="logado-btn">Página inicial</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">Logout</a>

      <p>Novo <a href="login.php">Login</a> ou <a href="register.php">Registro</a></p>
   </div>
</div>

<?php
  include "Includes/rodapeinclude.php";
?>
</body>
</html>