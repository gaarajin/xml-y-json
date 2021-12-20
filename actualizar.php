<?php 
    include("conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM empleados WHERE IDempleado='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Actualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    
        <div class="container mt-5">
                <form action="update.php" method="POST">
                    
                            <input type="hidden" name="IDempleado" value="<?php echo $row['IDempleado']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="Nombre" placeholder="Nombre" value="<?php echo $row['Nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="apellidoPat" placeholder="apellidoPat" value="<?php echo $row['apellidoPat']  ?>">
                                <input type="text" class="form-control mb-3" name="apellidoMat" placeholder="ApellidoMat" value="<?php echo $row['apellidoMat']  ?>">
                                <input type="text" class="form-control mb-3" name="numTelefonico" placeholder="numTelefonico" value="<?php echo $row['numTelefonico']  ?>">

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
</body>
</html>