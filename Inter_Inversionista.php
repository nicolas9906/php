<?php
  session_start();
  $usuario = $_SESSION['correousuario'];
  require 'db.php';


  // ACTUALIZAR DATOS DE LA IDEA DE NEGOCIO

 if (isset($_POST['editar'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $codnego = $_POST['codnego'];
    $nombreidea = $_POST['nombreidea'];
    $resumenidea = $_POST['resumenidea'];
    $costoini = $_POST['costoini'];
   
    $id = $_POST['id'];
    $query = "UPDATE `ideas` SET `nombre`='$nombre',`correo`='$correo',`codnego`='$codnego'
                      ,`nombreidea`='$nombreidea',`resumenidea`='$resumenidea',`costoini`='$costoini' WHERE id_ideas = $id";

   
    $conn = mysqli_query($conn, $query);                 
 
}

// MOSTRAR USUARIO LOGEADO

$query1 ="SELECT users_id,nombre FROM users where correo = '$usuario'";
$usersid = "";
 $_SESSION['users_id'] = $usersid;

$result = mysqli_query($conn, $query1);   

$datos = mysqli_fetch_array($result);

 


  ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    <id class = "navigation"></id>
</head>

<body>
    <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>

    <nav class="navbar-right">
    <ul  class="nav nav-tabs">
    <li class="nav-item">
          <a class="nav-link"  ><?php echo $datos['nombre']?>  </a>
          </li>

        <a class="nav-link" href="cerrar.php">CERRAR SESION</a>
      </div>
    </div>
  </div>
</nav>




             <table class="table table-dark table-striped">
             <thead>
          <tr>
              
             <th scope="col" > id &nbsp;&nbsp;&nbsp; </th> 
             <th scope="col" >Nombre de representante&nbsp;&nbsp;&nbsp;</th>
             <th scope="col" >Correo de representante&nbsp;&nbsp;&nbsp;</th>
            <th scope="col">Codigo idea&nbsp;&nbsp;&nbsp;</th> 
            <th scope="col">Nombre idea&nbsp;&nbsp;&nbsp;</th>
            <th scope="col">Resumen idea&nbsp;&nbsp;&nbsp; </th>
            <th scope="col">Costo inicial  </th>
            <th scope="col">Mensaje </h>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM ideas";
          $result_tasks = mysqli_query($conn, $query);    

          while($value = mysqli_fetch_array($result_tasks)) { 
                              echo "<td>" .$value['id_ideas']."</td>";
                              echo "<td>" .$value['nombre']. "</td>";
                               echo"<td>".$value['correo']. "</td>";
                               echo "<td>".$value['codnego']."</td>";
                               echo"<td>".$value['nombreidea']."</td>";
                              echo"<td>" .$value['resumenidea']. "</td>";
                              echo"<td>".$value['costoini']."</td>";
                              echo "<td>
                              <a href='mensaje.php?id=".$value['id_ideas']."'>Mensaje </a>
                              
                              </td>" ;
          
  
            ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>            
                          
             </div>

                 
            </article>
        </section>

      
    </div>
</body>

                        </html>