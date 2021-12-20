<?php
include("conexion.php");
$con=conectar();

$IDempleado=$_POST['IDempleado'];
$Nombre=$_POST['Nombre'];
$apellidoPat=$_POST['apellidoPat'];
$apellidoMat=$_POST['apellidoMat'];
$numTelefonico=$_POST['numTelefonico'];


$sql="INSERT INTO empleados VALUES('$IDempleado','$Nombre','$apellidoPat','$apellidoMat','$numTelefonico')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: empleados.php");
    
}else {
}
?>