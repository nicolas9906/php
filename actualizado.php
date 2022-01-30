<?php

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