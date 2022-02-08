<?php
  session_start();
 $usuario = $_SESSION['correousuario'];
//  echo "<p>Correo $usuario</p>";

  require 'db.php';


   // ACTUALIZAR 

   if (isset($_POST['editar'])){
      $nombre = $_POST['nombre'];
      $correo = $_POST['correo'];
      $codnego = $_POST['codnego'];
      $nombreidea = $_POST['nombreidea'];
      $resumenidea = $_POST['resumenidea'];
      $costoini = $_POST['costoini'];
     $id = $_POST['id'];
      $query = "UPDATE `ideas` SET `nombre`='$nombre',`correo`='$correo',`codnego`='$codnego'
                        ,`nombreidea`='$nombreidea',`resumenidea`='$resumenidea'
                        ,`costoini`='$costoini' WHERE id_ideas= $id";

     
      $res = mysqli_query($conn, $query);   
      if ( $res -> affected_rows < 0){

        header("location: Inter_emprendedor.php?error=hubo un problema");
      }else{
        header("location: Inter_emprendedor.php");
      }              
   
}

//MOSTRAR USUARIO LOGEADO

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
    <title>Interacción Emprendedor</title>
</head>

<body>
    <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>

    <div id="Main">
        


        <ul  class="nav nav-tabs">
          <li class="nav-item">
          <a class="nav-link"  ><?php echo $datos['nombre']?>  </a>
          </li>

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
          

      
            <tr>
            <table class="table table-striped   " >         
                          <th scope="col" >Id: </th>
                          <th scope="col" > Nombre:  </th> 
                          <!-- <th scope="col" >Correo: </th>
                          <th scope="col" >Codigo: </th>-->
                          <th scope="col" >Nombre Idea: </th> 
                          <th scope="col" >Resumen de idea: </th>
                          <th scope="col" >Costo Inicial: </th>
                          <th scope="col" >Editar: </th>
  
  
                          </tr>
                          </thead>
                          <tbody>
  
                          <?php     

                          
 
                          // $query1 ="SELECT  *  FROM users INNER JOIN registroidea 
                          //           ON registroidea.id_idea = users_id where users_id =  id_idea";
                          
                          $query1 ="SELECT ideas.id_ideas, ideas.nombre,ideas.nombreidea, ideas.resumenidea, ideas.costoini FROM ideas 
                          INNER JOIN users ON users.users_id = ideas.usuario_id where users.correo = '$usuario'";
                                         $usersid = "";
                                          $_SESSION['users_id'] = $usersid;

                          $result = mysqli_query($conn, $query1);    
                          $table = '';
                          echo "<tr>";

                         
                          while($value = mysqli_fetch_array($result)) { 
  
                                echo "<td>" .$value['id_ideas']."</td>";
                              echo "<td>" .$value['nombre']. "</td>";
                              // echo"<td>".$value['correo']. "</td>";
                              // echo "<td>".$value['codnego']."</td>";
                               echo"<td>".$value['nombreidea']."</td>";
                              echo"<td>" .$value['resumenidea']. "</td>";
                              echo"<td>".$value['costoini']."</td>";
                              echo "<td>
                              <a href='editar.php?id=".$value['id_ideas']."'>Editar </a>
                              
                              </td>" ;
                              echo "<td>
                              <a href='revisar.php?id=".$value['id_ideas']."'>mensaje </a>
                              
                              </td>";
                             
                              
                          echo "</tr>";
                          
                          ?>
                          <?php } ?>
                          
                          </table>
  
               
            
          </tr>
        </thead>
        <tbody>
                </div>

                
            </article>
      



        <footer>
        
                     <thead>
                       
                      
                        </tbody>
                            </table>




            
        </footer>
    </div>
</body>

                    </html>