
<?php
  session_start();
  $usuario = $_SESSION['correousuario'];
      
require 'db.php';

echo $_POST['nombre'];
echo $_POST['mensaje'];

// ID IDEAS
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query= "SELECT nombreidea,nombre,id_ideas FROM ideas WHERE id_ideas = '$id'";
   
    $res = mysqli_query($conn, $query);
    $datos = mysqli_fetch_array($res);
    // var_dump($datos);
    
}else{

    echo "error al enviar datos" ;
}


//MOSTRAR USUARIO
$query1 ="SELECT users_id,nombre,correo FROM users where correo = '$usuario'";
$usersid = "";
 $_SESSION['users_id'] = $usersid;

$result = mysqli_query($conn, $query1);   

$datos1 = mysqli_fetch_array($result);


// // MOSTRAR IDEA
// $query ="SELECT id_ideas,nombre FROM ideas where id_ideas= '$ideas'  ";
// $ideasid = "";
//  $_SESSION['id_ideas'] = $ideasid;

// $resultado = mysqli_query($conn, $query);   

// $datos = mysqli_fetch_array($resultado);

 
if ($_POST){

    $mensaje=  "INSERT INTO mensaje (nombre,mensaje,correo,id_ideas) VALUES ('".$_POST['nombre']."','".$_POST['mensaje']."','".$_POST['correo']."','".$_POST['id_ideas']."')";
    $result = mysqli_query($conn, $mensaje);

    if($result){

        echo "<strong> Mensaje enviado</strong> . <br>" ;
    }else {
 echo "no se envio el mensaje . <br>";
    }

}



?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Mensaje</title>
</head>
<body>
<header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>


    <nav class="navbar-right">
    <ul  class="nav nav-tabs">
    <li class="nav-item">
          <a class="nav-link"  > Usuario : <?php echo $datos1['nombre']?>  </a>
          </li>
          <li class="nav-item">
    <a class="nav-link" href="Inter_Inversionista.php">Menu </a>
  </li>
        <a class="nav-link" href="cerrar.php">CERRAR SESION</a>
      </div>
    </div>
  </div>
</nav>
<div class="container">
<form  class="form-horizontal" action="mensaje.php" method="post"> 
<div class="mb-3">
  <label  class="form-label" >Nombre</label>
  <input type="text" class="form-control" id="nombre" name= "nombre"    value=  "<?php echo $datos1['nombre']?> ">
</div>
<div class="mb-3">
  <label class="form-label">Mensaje</label>
  <textarea class="form-control"  id="mensaje" name= "mensaje" rows="3"></textarea>

  <div class="mb-3">
  <label  class="form-label" >Correo</label>
  <input type="text" class="form-control" id="nombre" name= "correo"    value=  "<?php echo $datos1['correo']?> ">
</div>

 <div class="col-sm-10">
        <input type="hidden"   name ="id_ideas" value="<?php echo $datos['id_ideas']?>">
      </div>
       
</div>
<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Enviar mensaje</button>
        <!-- <input type="submit" value="Registrar idea" class="button"> -->
      </div>
      
    </div>

</form>
</body>
</html>