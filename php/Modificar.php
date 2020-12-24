<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto-1</title>
    <!-- script -->
    <script src="https://kit.fontawesome.com/2608d06942.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <h3 class="text-center py-3">Proyecto-1</h3>
    </div>

    <div class="container-fluid  bg-light">
        <div class="container">
            <ul class="nav nav-justified py-2 nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="Listado.php">Listado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/index.html">Ingreso</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Busqueda.php">Busqueda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Eliminar.php">Eliminar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Modificar.php">Modificar</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container py-5">
            <form name="inicio" action="Modificar.php" method="post">
                <div class="form-group">
                    <label>Codigo del Producto a Modificar:</label>
                    <input type="text" name="Codigo" class="form-control">
                </div>
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="text" name="Precio" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pais de Origen:</label>
                    <input type="text" name="Pais" class="form-control">
                </div>
                <button type="submit" name="Enviar" value="Enviar" class="btn btn-primary">Modificar</button>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['Codigo'])){
            require("conexion.php");

            $Codigo=mysqli_real_escape_string($conexion, $_POST['Codigo']);
            $Precio=mysqli_real_escape_string($conexion, $_POST['Precio']);
            $Pais=mysqli_real_escape_string($conexion, $_POST['Pais']);
            $Estado=true;

            if(!strcasecmp($Pais, "Argentina")){
                $Estado=false;
            }

            $consulta="UPDATE `productos` SET Precio='$Precio', PaisOrigen='$Pais', Importado='$Estado' WHERE Codigo='$Codigo'";

            $resultados= mysqli_query ($conexion, $consulta);

            if($resultados && mysqli_affected_rows($conexion)==1){
                echo "Producto Modificado";   
            }
            else{
                if(mysqli_affected_rows($conexion)==0){///funcion de actividades en la base de datos-- en este caso 0 delete(eliminaciones)
                    echo "Producto no existente";
                }else{
                    echo "Error Producto no Modificado";
                }
            }

            mysqli_stmt_close($prepare);//cerramos la conexion
            
        }

    ?>

</body>

</html>