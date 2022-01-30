<?php 
require 'database.php';

 session_start();
/*
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1 :
                header('Location: Inter_Inversionista.php');

                break;
                case 2:

                    header('Location: Inter_Emprendedor.php');
                    break;

                    default:
        }

    }

    if (isset($_POST['correo']) && isset($_POST['password'])){

    $correo = $_POST['correo'];
    
    $password = $_POST['password'];
      $db = new database ();  
    $records =$db->$conn->prepare('SELECT id, correo, password,rol FROM users WHERE correo = :correo and password = :password');
    $records->execute(['correo'=> $correo, 'password'=> $password]);
    $row = $records->fetch(PDO::FETCH_NUM); 
    if ($row ==true){
        $rol = $row['3'];
        $_SESSION['rol'] = $rol;
        switch($_SESSION['rol']){
            case 1 :
                header('Location: Inter_Inversionista.php');

                break;
                case 2:

                    header('Location: Inter_Emprendedor.php');
                    break;

                    default:
        }

    }else{
        echo " El usuiario o contraseña incorrecta";
    }


}
*/


if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1 :
                header('Location: Inter_Inversionista.php');

                break;
                case 2:

                    header('Location: Inter_Emprendedor.php');
                    break;

                    default:
        }

    }


  if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    $email = $_POST['correo'];
    $password = $_POST['password'];
    $records = $conn->prepare('SELECT users_id, "$email", "$password", rol FROM users WHERE correo = :correo');
    $records->bindParam(':correo', $_POST['correo']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_NUM);
    if ($results ==true){
        $rol = $results['3'];
        $_SESSION['rol'] = $rol;
        switch($_SESSION['rol']){
            case 1 :
                header('Location: Inter_Inversionista.php');

                break;
                case 2:
                    $_SESSION['correousuario'] = $email;
                    $_SESSION['IdUsuario'] = $row['users_id'];
                    
                    header('Location: Inter_Emprendedor.php');
                    
                        // $query = "SELECT correo, nombre FROM users where   correo= ' ". $correo."'  ";
                        $query = "SELECT users_id, nombre, rol FROM users where correo = 'hermides@hotmail.com'  ";
                        $result = mysqli_query($conn, $query);    
                        echo ($result);
                        if($value = mysqli_fetch_array($result)) { 
                        
                            session_start();
                           
                            $_SESSION['nombre']= $row['nombre'];
                            $_SESSION['correo']=$row['correo'];


                       
                        }
                        if(isset($_SESSION['users'])){


                            
                            
                            echo $_SESSION['nombre'];
                            echo $_SESSION['correo'];
                            
                            
                            
                            }
                    
                    break;

                    default:
        }

    }else{
        echo " El usuiario o contraseña incorrecta";
    }

      
        }

 


       


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Index.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Login Alianza Leones</title>
</head>

<body>
<?php if(!empty($user)): ?>
      <br> Bienvenid@  <br> <?= $user['correo'];  ?>
      <br> <?= $user['roll'];  ?> <br>
      <br>
      <?php else: ?>
      <h1></h1>
      <div>

      </div>
      <?php endif; ?>

    <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>

    <div id="Main">
        <section>
            <article id="column1">
                <p class="p1">
                    No deje pasar el momento y registra tu idea de negocio
                    para que puedas contactar a personas interesadas en invertir
                    en proyectos innovadores, y si aun no cuentas con una idea
                    para desarrollar tendras a disposición material que te formara
                    en desarrollo de nuevas ideas.<br> <br>
                    Igualmente registrate en caso de estar buscando una idea
                    en donde invertir.
                </p>
            </article>

            <article id="column2">
                <form action="login.php" method="POST">

                    <br>
                    <i class="fas fa-user"></i>
                    <input name="correo" type="text" placeholder="Correo"><br>
                    <i class="fas fa-key"></i>
                    <input name= "password" type="password" placeholder="Contraseña">

                    <div class="div2">
                        <Nav>
                            <button type="button" class="btn btn-primary">Primary</button>
                            <input type="submit" value="Iniciar Sesión" class="button"><br>


                         

                            <i class="fas fa-user-plus"></i>&nbsp;&nbsp;
                            <a href="Validacion.php" class="a2"><b>Registrate</b></a>

                            <p class="p2">Al registrarte, aceptas nuestras Condiciones <br> de uso y Políticas de
                                Privacidad</p>
                        </Nav>
                    </div>
                </form>

            </article>

            <article id="column3">
                <h3> Punto de encuentro entre emprendedores e inversionistas</h3><br>
                <img class="img1" src="imagenes/Emprendedor_Inversionistas.jpg" alt="" style="max-width:100%; max-height: 100%;">
            </article>

        </section>
    

        <footer>
            <p class="p3"> Alianza de Leones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emprendedores2021@
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todos los derechos reservados</p>

        </footer>

    </div>

    

</body>

</html>