<?php

    $conexion= mysqli_connect ("localhost", "root", "");
    if(mysqli_connect_errno()){ ///verificamos la coneccion
        echo "salio mal";
        exit();
    }
    mysqli_select_db($conexion, "tp9") or die ("no se encuentra la base de datos");///verificamos la base de datos
    mysqli_set_charset($conexion, "utf8"); /// ponemos los caracteres en español

    $consulta="SELECT * FROM `Productos`"; /// si agrego -- WHERE Edad='0' -- puedo filtrar la informacion d ela base de datos

    $resultados= mysqli_query ($conexion, $consulta);
        
    //con array indexado
    while($fila= mysqli_fetch_row ($resultados)){ ///lee el archivo
        echo "<br> contraseña: ".$fila[0]."<br>";
        echo "<br> nombre: ".$fila[1]."<br>";
        echo "<br> apellido: ".$fila[2]."<br>";
        echo "<br> edad: ".$fila[3]."<br>";
        echo "<br><br>";
    }
        
    mysqli_close($conexion);//cerramos la conexion
    
?>