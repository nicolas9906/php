<?php 
require 'database.php';
$message = '';


if(!empty($_POST['numdoc']) && !empty($_POST['nom']) && !empty($_POST['apellido']) && !empty($_POST['genero']) && !empty($_POST['celular']) && !empty($_POST['correo']) && !empty($_POST['fecha'])&& !empty($_POST['ocupacion']) && !empty($_POST['nivelA']) && !empty($_POST['dire']) && !empty($_POST['depa']) && !empty($_POST['muni']) && !empty($_POST['nit']) && !empty($_POST['nomempresa']) && !empty($_POST['rut']) && !empty($_POST['tipoempre']) && !empty($_POST['numempleado']) && !empty($_POST['dirempre'])){
$base = " INSERT INTO registro  (numdoc,nom,apellido,genero,celular,correo,fecha,nivelA,ocupacion,dire,depa,muni,nit,nomempresa,rut,tipoempre,numempleado,dirempre) VALUES(:numdoc,:nom,:apellido,:genero,:celular,:correo,:fecha,:ocupacion,:nivelA,:dire,:depa,:muni,:nit,:nomempresa,:rut,:tipoempre,:numempleado,:dirempre)";
$reg = $conn->prepare($base);

$reg->bindParam(':numdoc', $_POST['numdoc']);
$reg->bindParam(':nom', $_POST['nom']);
$reg->bindParam(':apellido', $_POST['apellido']);
$reg->bindParam(':genero', $_POST['genero']);
$reg->bindParam(':celular', $_POST['celular']);
$reg->bindParam(':correo', $_POST['correo']);
$reg->bindParam(':fecha', $_POST['fecha']);
$reg->bindParam(':nivelA', $_POST['nivelA']);
$reg->bindParam(':ocupacion', $_POST['ocupacion']);
$reg->bindParam(':dire', $_POST['dire']);
$reg->bindParam(':depa', $_POST['depa']);
$reg->bindParam(':muni', $_POST['muni']);
$reg->bindParam(':nit', $_POST['nit']);
$reg->bindParam(':nomempresa', $_POST['nomempresa']);
$reg->bindParam(':rut', $_POST['rut']);
$reg->bindParam(':tipoempre', $_POST['tipoempre']);
$reg->bindParam(':numempleado', $_POST['numempleado']);
$reg->bindParam(':dirempre', $_POST['dirempre']);

if ($reg->execute()) {
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
    <meta nom="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Registro.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Registro</title>
</head>

<body>
    <header>
        <img src="imagenes/logo_2.jpg" alt="">
        <ul>
            <a href="login.php">Salir</a>
        </ul>
    </header>

    
<?php if(!empty($message)): ?>
  <p> <?= $message ?></p>
<?php endif; ?>


    <div id="Main">
        <section>
            <article id="column1">
                <ul class="menu">
                    <br>
                    <li><a href="registro.php">Registro de Datos</a>
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
                <form action="registro.php" method="post">
                    <div class="div1">
                        <label for="">Numero de documento: *&nbsp;&nbsp;&nbsp;</label>
                        <input  type="number" name = "numdoc" placeholder="Numero de documento"><br>

                        <label for="">Nombres: *&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name ="nom" placeholder="Nombres" autocomplete><br>

                        <label for="">Apellidos:*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" name = "apellido" placeholder="Apellidos" autocomplete><br>

                        <label for="">Selecciona tu genero &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <select name="genero" id="">
                        <option value="Seleccionar">Selecciona </option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="otro"> Otro</option>
                                 </select> <br>
                     
                        
                        <label for="">Celular: * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input  type="number" name ="celular" placeholder="Celular"><br>

                        <label for="">Correo Electrónico: *&nbsp;</label>
                        <input  type="email" name ="correo" placeholder="Correo Electrónico"><br>

                        <label for="">Fecha Nacimiento: *&nbsp;&nbsp;</label>
                        <input  type="text" name ="fecha" ><br>

                        <label for="">Nivel Acádemico: *&nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name = "nivelA" placeholder="Nivel Acádemico"><br>

                        <label for="">Ocupación: *&nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name = "ocupacion"placeholder="Ocupación"><br>

                        <label for="">Dirección: *&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name ="dire" placeholder="Dirección"><br>

                        <label for="">Departamento: *&nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name="depa" placeholder="Departamento"><br>

                        <label for="">Municipio: *&nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name = "muni" placeholder="Municipio"><br>

                        <label for="">Nit: &nbsp;&nbsp;&nbsp;</label>
                        <input  type="number"  name ="nit"placeholder="Nit"><br>

                        <label for="">Nombre de Empresa: </label>
                        <input  type="text" name = "nomempresa" placeholder="Nombre de la Empresa"><br>

                        <label for="">Rut: &nbsp;&nbsp;&nbsp;</label>
                        <input  type="number" name="rut" placeholder="Rut"><br>

                        <label for="">Tipo de Empresa: &nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name ="tipoempre" placeholder="Tipo de Empresa"><br>

                        <label for="">N° de Empleados: &nbsp;&nbsp;&nbsp;</label>
                        <input  type="number" name ="numempleado"placeholder="N° de Empleados"><br>

                        <label for="">Dirección Empresa: &nbsp;&nbsp;&nbsp;</label>
                        <input  type="text" name ="dirempre"placeholder="Dirección Empresa">
                        <p class="p2">Los campos marcados con * son obligatorios</p>
                    </div>

                    <nav class="nav2">
                     
                        <a href="Registrar_Perfil.php">Siguiente</a>
                        <input type="submit" value=" subir datos" class="button">
                    </nav>
                </form>
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