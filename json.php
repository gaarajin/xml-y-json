<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "sistemadeventas";
//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) 
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT * FROM empleados";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8

if(!$result = mysqli_query($conexion, $sql)) die();

$usuarios = array(); //creamos un array
while($row = mysqli_fetch_array($result)) 
{ 	
	$IDempleado=$row['IDempleado'];
	$Nombre=$row['Nombre'];
	$apellidoPat= $row['apellidoPat'] ;
	$apellidoMat=$row['apellidoMat'];
    $numTelefonico=$row['numTelefonico'];
	
	$empleados[] = array('IDempleado'=> $IDempleado,'Nombre'=> $Nombre, 'apellidoPat'=> $apellidoPat, 'apellidoMat'=> $apellidoMat,
						'numTelefonico'=> $numTelefonico);

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_string = json_encode($empleados);
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'usuarios.json';
file_put_contents($file, $json_string);
*/
	
