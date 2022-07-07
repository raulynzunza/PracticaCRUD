<?php
    include "conexion.php";
    
    $consulta = "select * from accidente";
    $resultado_consulta = mysqli_query($conexion,$consulta); 
  
?>