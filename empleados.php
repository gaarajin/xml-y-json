<?php
    include("conexion.php");
    $con=conectar();

    $sql="SELECT * FROM empleados";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Página Empleados</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">

        <div class="col-md-3">
            <h1>Ingrese Datos</h1>
            <form action="insertar.php" method="POST">

                <input type="text" class="form-control mb-3" name="IDempleado" placeholder="id empleado">
                <input type="text" class="form-control mb-3" name="Nombre" placeholder="Nombre">
                <input type="text" class="form-control mb-3" name="apellidoPat" placeholder="apellidoPat">
                <input type="text" class="form-control mb-3" name="apellidoMat" placeholder="ApellidoMat">
                <input type="text" class="form-control mb-3" name="numTelefonico" placeholder="numTelefonico">

                <input type="submit" class="btn btn-primary">
</form>
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead class="table-success table-striped">
                    <tr>
                        <th>IDempleado</th>
                        <th>Nombre</th>
                        <th>apellidoPat</th>
                        <th>apellidoMat</th>
                        <th>numTelefonico</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                         <?php
                            while($row=mysqli_fetch_array($query)){
                         ?>
                            <tr>
                                <th><?php  echo $row['IDempleado']?></th>
                                <th><?php  echo $row['Nombre']?></th>
                                <th><?php  echo $row['apellidoPat']?></th>
                                <th><?php  echo $row['apellidoMat']?></th>
                                <th><?php  echo $row['numTelefonico']?></th>
                                <th><a href="actualizar.php?id=<?php echo $row['IDempleado'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete.php?id=<?php echo $row['IDempleado'] ?>" class="btn btn-danger">Eliminar</a></th>       
                            </tr>
                        <?php
                            }
                        ?>
                            
                </tbody>
            </table>
        </div>

    </div>
