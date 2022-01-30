<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    $query= "SELECT * FROM ideas WHERE id_ideas = '$id'";
    $res = mysqli_query($conn, $query);
    $datos = mysqli_fetch_array($res);
    
}else{

    header("Location: login.php"); 
}


?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Editar idea </title>

</head>
<body>
   

    <div id="Main">
        <section>
        <ul  class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="Registrar_Idea.php">Registrar idea</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Modulo_Formacion.php">Modulo de formacion</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Inter_Emprendedor.php">Menu </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Cerrar.php">Cerrar sesion </a>
  </li>
  
</ul>

    <p>hola</p>
    <form action ="Inter_Emprendedor.php" method ="post">
            <p>Nombre de respresentante : <input type="text" name="nombre" value = "<?php echo $datos['nombre']?> " ></p>;
            <p>Correo : <input type="text" name="correo" value = "<?php echo $datos['correo']?> " ></p>; 
            <p>Codigo de negocio : <input type="text" name="codnego" value = "<?php echo $datos['codnego']?> " ></p>;
            <p>nombre de la idea de negocio : <input type="text" name="nombreidea" value = "<?php echo $datos['nombreidea']?> " ></p>;
            <p>Resumen de la idea de negocio : <input type="text" name="resumenidea" value = "<?php echo $datos['resumenidea']?> " ></p>;
            <p>Costo inicial : <input type="text" name="costoini" value = "<?php echo $datos['costoini']?> " ></p>;
            <input type="hidden" name= "id" value="<?php echo $id?>">
            <input type="submit" name ="editar" value= "guardar">
    </form>
</body>
</html>