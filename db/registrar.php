<?php
    include ("conexion.php");
        
    if(isset($_POST['registrar'])){
        if(strlen($_POST['fecha']) >= 1 && strlen($_POST['descripcion']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['acciones']) >= 1){
            $fecha = trim($_POST['fecha']);
            $descripcion = trim($_POST['descripcion']);
            $nombre = trim($_POST['nombre']);
            $acciones = trim($_POST['acciones']);            
            $estado = $_POST['estado'];
    
            $registros = "insert into accidente(fecha,descripcion,nombre,acciones,estado) values('$fecha', '$descripcion','$nombre','$acciones','$estado');";
            $resultado_registros = mysqli_query($conexion,$registros);              
        } 
    }               
?>