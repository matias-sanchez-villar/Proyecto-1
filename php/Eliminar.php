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
                    <a class="nav-link active" href="Eliminar.php">Eliminar</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container py-5">
            <form name="inicio" action="Busqueda.php" method="post">
                <div class="form-group">
                    <label>Codigo del Producto a eliminar:</label>
                    <input type="text" name="Buscar" class="form-control">
                </div>
                <button type="submit" name="Enviar" value="Enviar" class="btn btn-primary">Eliminar</button>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['Buscar'])){
            ucfirst ($Nombre=$_POST['Buscar']);
            $conexion= mysqli_connect ("localhost", "root", "");
            if(mysqli_connect_errno()){ ///verificamos la coneccion
                echo "salio mal";
                exit();
            }
            mysqli_select_db($conexion, "tp9") or die ("no se encuentra la base de datos");///verificamos la base de datos
            mysqli_set_charset($conexion, "utf8"); /// ponemos los caracteres en español


            $consulta="SELECT * FROM `productos` WHERE Nombre LIKE '%$Nombre%'";

            $resultados= mysqli_query ($conexion, $consulta);

            echo("
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Codigo</th>
                        <th scope='col'>Seccion</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Precio</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Impotado</th>
                        <th scope='col'>Pais de Origen</th>
                        <th scope='col'>Foto</th>
                    </tr>
                </thead>");
                
            //con array indexado
            while($fila= mysqli_fetch_row ($resultados)){ ///lee el archivo
                if($fila[5]){
                    $fila[5]="Si";
                }else{
                    $fila[5]="No";
                }
                echo("
                    <tbody>
                        <tr>
                            <th scope='row'>$fila[0]</th>
                            <td>$fila[1]</td>
                            <td>$fila[2]</td>
                            <td>$fila[3]</td>
                            <td>$fila[4]</td>
                            <td>$fila[5]</td>
                            <td>$fila[6]</td>
                            <td>$fila[7]</td>
                        </tr>
                    </tbody>
                ");
            }
            echo "</table>";

            mysqli_close($conexion);//cerramos la conexion
            
        }

    ?>

</body>

</html>