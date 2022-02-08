<?php 
session_start();

// echo $_POST['nombre'];
// echo $_POST['correo'];
// echo $_POST['codnego'];
// echo $_POST['nombreidea'];
// echo $_POST['resumenidea'];
// echo $_POST['costoini'];
// echo $_POST['usuario_id'];

$usuario = $_SESSION['correousuario'];
//  echo "<p>Correo $usuario</p>";
// $usuarioId = $_SESSION['users_id'];
// echo "<p>Id $usuarioId</p>";
require 'db.php';
// if (isset($_GET['correousuario'])) {
//   $id = $_GET['correousuario'];
//   echo $id;
//   $query= "SELECT users.users_id FROM users WHERE correo = '$usuario'";
//   $res = mysqli_query($conn, $query);
//   $datos = mysqli_fetch_array($res);
  
// }

                  

                        $query1 ="SELECT users_id FROM users where correo = '$usuario'";
                                       $usersid = "";
                                        $_SESSION['users_id'] = $usersid;

                        $result = mysqli_query($conn, $query1);   

                        $datos = mysqli_fetch_array($result);
              
                        // echo "<p>Correo $usuario</p>";
                        // echo $datos['users_id']; 

                        // while($value1 = mysqli_fetch_array($result)) { 
                        //   echo "<p>" .$value1['users_id']."</p>";
                          
                        // }

                        


$message = '';
// $usuario = $_SESSION['correousuario'];


// if (!empty($_POST['nombre'])&& !empty($_POST['correo'])  && !empty($_POST['codnego']) && !empty($_POST['nombreidea']) && !empty($_POST['resumenidea']) && !empty($_POST['costoini']) && !empty($_POST['usuario_id'])) {
  if($_POST)
  {
// $idea =  'INSERT INTO ideas (nombre,correo,codnego,nombreidea,resumenidea,costoini,usuario_id) VALUES  (:nombre, :correo, :codnego, :nombreidea, :resumenidea, :costoini, :users_id)';

$idea =  "INSERT INTO ideas (nombre,correo,codnego,nombreidea,resumenidea,costoini,usuario_id) VALUES  ('".$_POST['nombre']."', '".$_POST['correo']."', '".$_POST['codnego']."', '".$_POST['nombreidea']."', '".$_POST['resumenidea']."', '".$_POST['costoini']."', '".$_POST['usuario_id']."')";

$resultInsert = mysqli_query($conn, $idea); 
 
         if($resultInsert)
         {
            echo "<strong>Se ingresaron los registros con exito</strong>. <br>";
         }
         else
         {
            echo "No se ingresaron los registros. <br>";
         }

// $regidea= $conn->prepare($idea);
// $regidea->bindParam(':nombre', $_POST['nombre']);
// $regidea->bindParam(':correo', $_POST['correo']);
// $regidea->bindParam(':codnego', $_POST['codnego']);
// $regidea->bindParam(':nombreidea', $_POST['nombreidea']);
// $regidea->bindParam(':resumenidea', $_POST['resumenidea']);
// $regidea->bindParam(':costoini', $_POST['costoini']);
// $regidea->bindParam(':users_id', $_POST['usuario_id']);



// if ($regidea->execute()) {
//     $message = 'Registro exitoso!!';
//   } else {
//     $message = 'no funciona men';
//   }


   }



?>


<!DOCTYPE html>
<html lang="en"></html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Registrar Idea Negocio</title>
</head>

<body>

<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>


    <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>

    <div id="Main">
        <section>
        <ul  class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="Registrar_Idea.php">Registrar idea</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="Inter_Emprendedor.php">Menu </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Cerrar.php">Cerrar sesion </a>
  </li>
  
</ul>
</section>

<!-- <div class="container">
  <h2>Inline form: control states</h2>
       
                <form action="Registrar_Idea.php" method="post"  class="form-horizontal" >
                   
                
                        
                    <label for="">Nombre de representante *</label>
                        <input  type="text"  name ="nombre" placeholder="Nombre"><br>

                        <label for="staticEmail2" class="visually-hidden">Correo : </label>
                        <input  type="email"  name = "correo" placeholder="Correo"><br>


                        <label for="">Codigo idea de negocio: *</label>
                        <input  type="number"  name = "codnego" placeholder="Cédula o código"><br>

                        <label for="">Nombre idea de negocio o investigación:*</label>
                        <input  class="form-control form-control-lg" type="text" name ="nombreidea" placeholder="Nombre idea de negocio o investigación"
                            autocomplete><br>


                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Resumen de idea</label>
                                <textarea class="form-control" name = "resumenidea"   id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>


                        

                        <label for="">Costo inicial:*</label>
                        <input  type="number" name ="costoini" placeholder="Valor aproximado" autocomplete><br>

                        <label for="">Id:*</label>

                        <input type="text" name ="usuario_id" id="usuario_id" value="<?php echo $datos['users_id']?> " ></p>;

        

                        <p >Los campos marcados con * son obligatorios</p>

                        <br>
                    </div>

                    <nav class="nav2">
                       
                        <input type="submit" value="Registrar idea" class="button">
                    </nav>
                </form>
</div> -->

<div class="container">
  <h2>Ideas</h2>
  <form class="form-horizontal" action="Registrar_Idea.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre de representante:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" placeholder="Ingresa nombre" name="nombre" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Correo:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="correo" placeholder="Ingresa Correo" name="correo" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Codigo idea de negocio:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="codnego" placeholder="Ingresa Codigo" name="codnego" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre idea de negocio o investigación:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nombreidea" placeholder="Ingresa Nombre" name="nombreidea" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Resumen de idea:</label>
      <div class="col-sm-10">
      <textarea class="form-control" rows="5" name="resumenidea"  id="resumenidea"></textarea required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Costo inicial:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="costoini" placeholder="Ingresa Costo" name="costoini" required>
      </div>
    </div>

    <div class="form-group">
      <!-- <label class="control-label col-sm-2" for="nombre">Costo inicial:</label> -->
      <div class="col-sm-10">
        <input type="hidden"  name="usuario_id" value="<?php echo $datos['users_id']?>">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar Idea</button>
        <!-- <input type="submit" value="Registrar idea" class="button"> -->
      </div>
    </div>
  </form>
</div>
        <!-- <br>
        <br>
        <footer>
            <p class="p3"> Alianza de Leones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emprendedores2021@
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todos los derechos reservados
            </p>
        </footer> -->
    </div>
</body>
</html>