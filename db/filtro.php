<?php
    if(isset($_POST['filtrar'])){
        $filtro = $_POST['filtro'];
        if($filtro == "todo-filtro"){
            $consulta = "select * from accidente;";
        }else if($filtro == "abierto-filtro"){
            $consulta = "select * from accidente where estado = abierto";
            
        }else{
            $consulta = "select * from accidente where estado = cerrado";            
        }
        $resultado_consulta = mysqli_query($conexion,$consulta);
         
    }      
?>