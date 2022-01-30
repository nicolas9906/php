<?php 
require 'database.php';
$message = '';

if (!empty($_POST['nombre']) &&!empty($_POST['tipe']) && !empty($_POST['numerdoc']) && !empty($_POST['correo']) && !empty($_POST['rol']) && !empty($_POST['password']) && !empty($_POST['repassword'])){
    $sql = "INSERT INTO users (tipe,nombre,numerdoc,correo,rol,password,repassword) VALUES (:tipe,:nombre,:numerdoc,:correo,:rol,:password,:repassword)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':tipe', $_POST['tipe']);
    $stmt->bindParam(':numerdoc', $_POST['numerdoc']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':rol', $_POST['rol']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $repassword = password_hash($_POST['repassword'], PASSWORD_BCRYPT);
    $stmt->bindParam(':repassword', $repassword);

    if ($stmt->execute()) {
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
    <link rel="stylesheet" href="CSS/Validacion.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Validacion</title>
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

                <form action="Validacion.php" method="post">
                    
                    <div class="div1">
                        <label for="">Tipo de documento identidad &nbsp;</label>
                        <select name="tipe" id="">
                            <option value="Seleccionar">Seleccionar</option>
                            <option value="Cédula">Cédula de Ciudadanía</option>
                            <option value="Targeta de Identidad">Targeta de Identidad</option>
                            <option value="Cédula de extranjería">Cédula de extranjería</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Nit">Nit (Número de Identificación Tributaria)</option>
                            <option value="PEP-RAMV">PEP-RAMV</option>
                            <option value="PEP">PEP</option>
                        </select><br>

                
                        <label for="">Numero de documento &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</label>
                        <input type="number" name="numerdoc" placeholder="Numero de documento"><br>


                        <label for="">Nombre Completo &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</label>
                        <input type="text" name="nombre" placeholder="Digite su nombre"><br>

                        <label for="">Correo Electronico &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</label>
                        <input type="text" name ="correo" placeholder="Correo Electronico"><br>

                        <label for="">Tipo de rol  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select name="rol" id="">
                            <option value="Seleccionar">Seleccione el rol</option>
                            <option value="1">inversionistas</option>
                            <option value="2">Emprendedor</option>
                            </select><br>

                        <label for="">Crear Contraseña &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</label>
                        <input type="password" name ="password" placeholder="Crear contraseña" id="pass" ><br>

                        <label for="">Confirmar Contraseña &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</label>
                        <input type="password" name ="repassword"placeholder="Confirmar contraseña">
                    </div>
                    <nav>
                        <a href="login.php">Regresar al inicio</a>
                       
                        <input type="submit" value="Validar" class="button" onclick="verificarPassword() >
                    </nav>
                </form>
                <script src = "js/password.js "></script>
            </article>
        </section>
        
        <footer>
            <p class="p3"> Alianza de Leones &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Emprendedores2021@
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todos los derechos reservados</p>

        </footer>

    </div>

</body>

</html>