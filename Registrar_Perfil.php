<?php 
require 'database.php';
$message = '';
if ( !empty($_POST['descripcion'])&& !empty($_POST['tipersona'])&& !empty($_POST['experiencia'])){
$regis = " INSERT INTO registroperfil (,descripcion,tipersona,experiencia) VALUES (:,:descripcion,:tipersona,:experiencia)";
$register = $conn->prepare($regis);
;
$register->bindParam(':descripcion', $_POST['descripcion']);
$register->bindParam(':tipersona', $_POST['tipersona']);
$register->bindParam(':experiencia', $_POST['experiencia']);

if ($register->execute()) {
    $message = 'Registro exitoso!!';
  } else {
    $message = 'no funciona men';
  }

}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Registrar_Perfil.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Registrar Perfil</title>
</head>

<body>
    <header>
        <img src="imagenes/logo_2.jpg" alt="">
    </header>

    <?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>

    <div id="Main">
        <section>
            <article id="column1">
                <ul class="menu">
                    <br>
                    <li><a href="Registro.php">Registro de Datos</a>
                        <ul>
                            <li><a href="Actualizar_Registro.php">Actualizar datos</a></li>
                        </ul>

                    </li><br><br>

                    <li><a href="Registrar_Perfil.php">Perfil</a>
                        <ul>
                            <li><a href="Actualizar_Perfil.php">Actualizar Perfil</a></li>
                        </ul>

                    </li><br><br>

                    <li><a href="Registrar_Idea.php">Idea de negocio</a>
                        <ul>
                            <li><a href="Actualizar_IdeaNegocio.php">Actualizar idea de Negocio</a></li>
                        </ul><br><br><br>
                    </li>
                    <li><a href="Modulo_Formacion.php">Modulo de Formación</a></li><br><br>
                    <li><a href="Inter_Emprendedor.php">Interacciones</a></li>
                </ul>
            </article>
            <article id="column2">

            
                <form action="Registrar_Perfil.php" method="post" >
                    <div class="div1">

                    

                

                        <label class="Label1">Descripción del Perfil: *&nbsp;&nbsp;</label>
                        <textarea class="Perfil" name ="descripcion"
                            placeholder="Descripción del perfil no mayor a 200 palabras"></textarea><br>

                            <label for="">Tipo de persona &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select name="tipersona" id="">
                        <option value="Seleccionar">Selecciona </option>
                            <option value="Seleccionar">Natural</option>
                            <option value="Cédula">Juridica</option>
                          
                                 </select> <br>

                       

                        <label for="">Trayectoria o Experiencia:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <textarea class="Perfil" name="experiencia" placeholder="Descripción de experiencia no mayor a 200 palabras"></textarea><br>
                        <p class="p2">Los campos marcados con * son obligatorios</p>
                    </div>

                    <nav class="nav2">
                        <a href="registro.php">Atras</a>
                        <a href="Registrar_Idea.php">Siguiente</a>
                        <input type="submit" value="Terminar hasta Aquí" class="button">
                    </nav>
                </Form>
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