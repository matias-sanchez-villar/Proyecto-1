<?php

    $Seccion=ucfirst ($Seccion=$_POST["Seccion"]);
    $Nombre=ucfirst ($Nombre=$_POST["Nombre"]);
    $Precio=$_POST["Precio"];
    $PaisOrigen= ucfirst ($PaisOrigen=$_POST["PaisOrigen"]);
    $Fecha=$_POST["Fecha"];
    $Estado=true;

    if(!strcasecmp($_POST["PaisOrigen"], "Argentina")){
        $Estado=false;
    }
    
    $conexion= mysqli_connect ("localhost", "root", "");
    if(mysqli_connect_errno()){ ///verificamos la coneccion
        echo "salio mal";
        exit();
    }
    mysqli_select_db($conexion, "tp9") or die ("no se encuentra la base de datos");///verificamos la base de datos
    mysqli_set_charset($conexion, "utf8"); /// ponemos los caracteres en español

    

    $consulta="INSERT INTO `productos`(`Seccion`, `Nombre`, `Precio`, `Fecha`, `Importado`, `PaisOrigen`) VALUES ('$Seccion','$Nombre','$Precio','$Fecha','$Estado','$PaisOrigen')"; 

    $resultados= mysqli_query ($conexion, $consulta);
    
    if($resultados){
        echo ("Mensaje Enviado  ");
    }else{
        echo ("Error Mensaje no Enviado  ");
    }
    echo ("  <a href='../html/index.html'>Ingreso</a>");
    mysqli_close($conexion);//cerramos la conexion


?>