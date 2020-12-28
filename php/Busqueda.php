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
                    <a class="nav-link active" href="Busqueda.php">Busqueda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Eliminar.php">Eliminar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Modificar.php">Modificar</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container py-5">
            <form name="inicio" action="Busqueda.php" method="post">
                <div class="form-group">
                    <label>Nombre producto:</label>
                    <input type="text" name="Buscar" class="form-control">
                </div>
                <button type="submit" name="Enviar" value="Enviar" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['Buscar'])){
            require("conexion.php");
            $Buscar=$_POST['Buscar'];
            
            $sql="SELECT * FROM productos WHERE Nombre LIKE ?";
            $prepare=mysqli_prepare($conexion, $sql);
            if(mysqli_stmt_bind_param($prepare, "s", $Buscar)==false){
                echo "error de datos";
            }
            if(mysqli_stmt_execute($prepare)==false){
                echo "Error de consulta";
            }
            if(mysqli_stmt_bind_result($prepare, $Codigo, $Seccion, $Nombre, $Precio, $Fecha, $Importado, $PaisOrigen, $Foto)==false){
                echo "error de resultados";
            }

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
            while(mysqli_stmt_fetch ($prepare)){ ///lee el archivo
                if($Importado){
                    $Importado="Si";
                }else{
                    $Importado="No";
                }
                echo("
                    <tbody>
                        <tr>
                            <th scope='row'>$Codigo</th>
                            <td>$Seccion</td>
                            <td>$Nombre</td>
                            <td>$Precio</td>
                            <td>$Fecha</td>
                            <td>$Importado</td>
                            <td>$PaisOrigen</td>
                            <td>$Foto</td>
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