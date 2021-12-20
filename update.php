<?php

include("conexion.php");
$con=conectar();

$IDempleado=$_POST['IDempleado'];
$Nombre=$_POST['Nombre'];
$apellidoPat=$_POST['apellidoPat'];
$apellidoMat=$_POST['apellidoMat'];
$numTelefonico=$_POST['numTelefonico'];

$sql="UPDATE empleados SET  Nombre='$Nombre',apellidoPat='$apellidoPat',apellidoMat='$apellidoMat',numTelefonico='$numTelefonico' WHERE IDempleado='$IDempleado'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: empleados.php");
    }
?>