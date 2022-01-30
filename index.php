<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id,tipe,numerdoc, email,roll, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->bindParam(':id', $_SESSION['rol_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Index.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Menu Alianza Leones</title>
</head>
  <body>
  <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>
   

    

    <?php if(!empty($user)): ?>
      <br> Bienvenid@  <br> <?= $user['email']; 
      ?>
      <br>Usted se logeo correctamente


          <br>
          
          <div align="center">
           Inicia registro de el  emprendimiento
       
        <br>
             <a class="btn btn-primary" href="registro.php" role="button">Registro</a>
  
         </div>
            </span>
          

      <div align=left>
      <a href="cerrar.php">
        Cerrar sesion
      </a>
      </div>
    <?php else: ?>
      <h1>Porfavor inicie sesion  o registrese</h1>
      <div>
      <a href="login.php">Iniciar sesion/a> or
      <a href="validacion.php">Registro</a>
      </div>
      <?php endif; ?>




    <footer>
            <p class="p3"> Alianza de Leones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emprendedores2021@
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todos los derechos reservados</p>

        </footer>

        
  </body>
</html>