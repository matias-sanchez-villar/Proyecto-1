<?php

    require("conexion.php");/// requerida para usar $conexion
        /// traemos todos los campos
        $Seccion=$_POST["Seccion"];
        $Nombre=$_POST["Nombre"];
        $Precio=$_POST["Precio"];
        $Fecha=$_POST["Fecha"];
        $PaisOrigen= $_POST["PaisOrigen"];
        $Estado=true;

        if(!strcasecmp($_POST["PaisOrigen"], "Argentina")){
            $Estado=false;
        }    
        
        ///base de datos
                
        $sql="INSERT INTO `productos`(`Seccion`, `Nombre`, `Precio`, `Fecha`, `Importado`, `PaisOrigen`) VALUES (?,?,?,?,?,?)";

        $Prepare=mysqli_prepare($conexion, $sql);

        mysqli_stmt_bind_param($Prepare,"ssssss", $Seccion, $Nombre, $Precio, $Fecha, $Estado, $PaisOrigen);
        
        if(mysqli_stmt_execute($Prepare)){
            echo "Enviado";
        }else{
            echo "no enviado";
        }
        echo "  <a href='../html/index.html'>Ingreso</a>";
        mysqli_stmt_close($Prepare);//cerramos la conexion

?>