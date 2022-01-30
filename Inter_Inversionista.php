<?php
  session_start();

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
    $query = "UPDATE `registroidea` SET `nombre`='$nombre',`correo`='$correo',`codnego`='$codnego'
                      ,`nombreidea`='$nombreidea',`resumenidea`='$resumenidea',`costoini`='$costoini' where id_idea = $id";

   
    $conn = mysqli_query($conn, $query);                 
 
}



  ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Inter_Inversionista.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <id class = "navigation"></id>
</head>

<body>
    <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>

    <div id="Main">
        <section>
            <article id="column1">
                <ul class="menu">
                  
                    <a class="btn btn-primary" href="cerrar.php" role="button">Cerrar sesion</a>
                </ul>
            </article>

            <article id="column2">
                <div>

                    <div class="div1">
                        <p class="p1">&nbsp;&nbsp;&nbsp;Visualizar listado de ideas de negocio o investigación</p>
                        <label class="Label1">1er: &nbsp;</label>
                        
                        
                    <br>
                    <br>


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
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM registroidea";
          $result_tasks = mysqli_query($conn, $query);    

          while($value = mysqli_fetch_array($result_tasks)) { ?>
          <tr>
          
            <td><?php echo $value['id_idea']; ?></td>
            <td><?php echo $value['nombre']; ?></td>
            <td><?php echo $value['correo']; ?></td>
            <td><?php echo $value['codnego']; ?></td>
            <td><?php echo $value['nombreidea']; ?></td>
            <td><?php echo $value['resumenidea']; ?></td>
            <td><?php echo $value['costoini']; ?></td>
            
          </tr>
          <?php } ?>
        </tbody>
      </table>            
                          
             </div>

                    <div class="div2">

                        <label for=""><i class="fas fa-bell"></i>&nbsp;&nbsp;gmail, google meet: &nbsp;</label> <a
                            href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"
                            target="blank">https://gmail.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <label for="">Whatsapp: &nbsp;</label> <a href="https://wa.me/3217218303" target="blank"><i
                                class=" i1 fab fa-whatsapp"></i></a>
                    </div>
            </article>
        </section>

        <footer>
            <p class="p3"> Alianza de Leones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emprendedores2021@
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todos los derechos reservados
            </p>
        </footer>
    </div>
</body>

                        </html>