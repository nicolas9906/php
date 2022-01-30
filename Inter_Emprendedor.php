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
      $query = "UPDATE `oideas` SET `nombre`='$nombre',`correo`='$correo',`codnego`='$codnego'
                        ,`nombreidea`='$nombreidea',`resumenidea`='$resumenidea',`costoini`='$costoini' where id_idea = $id";

     
      $res = mysqli_query($conn, $query);                 
   
}

 
 
  ?>
  


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Inter_Emprendedor.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Interacción Emprendedor</title>
</head>

<body>
    <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>

    <div id="Main">
        <section>


        <ul  class="nav nav-tabs">
          <li class="nav-item">
          <a class="nav-link" >usuario  </a>
          </li>

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
          

      
            <tr>
            <table class="table table-striped   " >         
                          <th scope="col" >Id: </th>
                          <th scope="col" > Nombre:  </th> 
                          <!-- <th scope="col" >Correo: </th>
                          <th scope="col" >Codigo: </th>
                          <th scope="col" >Nombre Idea: </th> -->
                          <th scope="col" >Resumen de idea: </th>
                          <th scope="col" >Costo Inicial: </th>
                          <th scope="col" >Editar: </th>
  
  
                          </tr>
                          </thead>
                          <tbody>
  
                          <?php     

                          
 
                          // $query1 ="SELECT  *  FROM users INNER JOIN registroidea 
                          //           ON registroidea.id_idea = users_id where users_id =  id_idea";
                          
                          $query1 ="SELECT ideas.id_ideas, ideas.nombre, ideas.resumenidea, ideas.costoini FROM ideas 
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
                              // echo"<td>".$value['nombreidea']."</td>";
                              echo"<td>" .$value['resumenidea']. "</td>";
                              echo"<td>".$value['costoini']."</td>";
                              echo "<td>
                              <a href='editar.php?id=".$value['id_ideas']."'>Editar </a>
                              
                              </td>" ;
                             
                              
                          echo "</tr>";
                          
                          ?>
                          <?php } ?>
                          
                          </table>
  
               
            
          </tr>
        </thead>
        <tbody>
                </div>

                
            </article>
        </section>



        <footer>
        
                     <thead>
                       
                      
                        </tbody>
                            </table>




            
        </footer>
    </div>
</body>

                    </html>