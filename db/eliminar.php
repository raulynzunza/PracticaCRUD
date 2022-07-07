<?php
    include "conexion.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $consultaEliminar = "delete from accidente where id = $id";
        $result = mysqli_query($conexion,$consultaEliminar);         
    
        header("Location: ../pages/index.php");        
    }         
?>