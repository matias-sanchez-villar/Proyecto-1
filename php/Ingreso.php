<?php

    require("conexion.php");/// requerida para usar $conexion

        /// traemos todos los campos
        $Seccion=ucfirst ($Seccion=$_POST["Seccion"]);
        $Nombre=ucfirst ($Nombre=$_POST["Nombre"]);
        $Precio=$_POST["Precio"];
        $Fecha=$_POST["Fecha"];
        $PaisOrigen= ucfirst ($PaisOrigen=$_POST["PaisOrigen"]);
        $Estado=true;

        if(!strcasecmp($_POST["PaisOrigen"], "Argentina")){
            $Estado=false;
        }    
        
        ///base de datos
                
        $sql="INSERT INTO productos(Seccion, Nombre, Precio, Fecha, Importado, PaisOrigen) VALUES (?,?,?,?,?,?)";
        
        $prepare=mysqli_prepare($conexion, $sql);
        
        if(mysqli_stmt_bind_param($prepare, "ssdsss", $Seccion, $Nombre, $Precio, $Fecha, $Estado, $PaisOrigen)==false){
                echo "error de datos";
        }else{
            echo ("Error Mensaje no Enviado  ");
        }
        echo ("  <a href='../html/index.html'>Ingreso</a>");
        mysqli_stmt_close($prepare);//cerramos la conexion


?>