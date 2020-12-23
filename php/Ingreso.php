<?php

require("conexion.php");/// requerida para usar $conexion

    /// traemos todos los campos
    $Seccion=ucfirst ($Seccion=$_POST["Seccion"]);
    $Nombre=ucfirst ($Nombre=$_POST["Nombre"]);
    $Precio=$_POST["Precio"];
    $PaisOrigen= ucfirst ($PaisOrigen=$_POST["PaisOrigen"]);
    $Fecha=$_POST["Fecha"];
    $Estado=true;

    if(!strcasecmp($_POST["PaisOrigen"], "Argentina")){
        $Estado=false;
    }    
    
    ///base de datos
    $consulta="INSERT INTO `productos`(`Seccion`, `Nombre`, `Precio`, `Fecha`, `Importado`, `PaisOrigen`) VALUES ('$Seccion','$Nombre','$Precio','$Fecha','$Estado','$PaisOrigen')"; 

    $resultados= mysqli_query ($conexion, $consulta);
    
    ///verificamos
    if($resultados){
        echo ("Mensaje Enviado  ");
    }else{
        echo ("Error Mensaje no Enviado  ");
    }
    echo ("  <a href='../html/index.html'>Ingreso</a>");
    mysqli_close($conexion);//cerramos la conexion


?>