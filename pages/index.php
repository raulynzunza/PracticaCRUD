<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto+Mono:wght@300&family=Roboto:ital,wght@0,100;0,500;1,500&display=swap" rel="stylesheet">
    <title>BD</title>
</head>
<body>
    <header>
        <h1>Incidentes</h1>
    </header>
    <main>
            <form  class="formulario" method="post">
                <div>
                    <label for="fecha" class="labels">Fecha:</label>
                    <input type="date" name="fecha"  required id="fecha" class="inputs">
                </div>
                <div>
                    <label for="descripcion" class="labels">Descripcion:</label>
                    <input type="text" name="descripcion" required id="descripcion" class="inputs">
                </div>
                <div>
                    <label for="nombre" class="labels">Nombre:</label>
                    <input type="text" name="nombre" required id="nombre" class="inputs">
                </div>                        
                <div>
                    <label for="acciones" class="labels">Acciones:</label>
                    <input type="text" name="acciones" id="acciones" class="inputs"></input>                    
                </div>      
                <div>
                    <label for="">Estados</label>
                    <br>
                    <label for="abierto">Abierto:</label>
                    <input type="radio" name="estado" id="abierto" value="abierto">
                    <label for="cerrado">Cerrado:</label>
                    <input type="radio" name="estado" id="cerrado" value="cerrado">
                </div>                     
                <input type="submit" id="boton" name="registrar" class="botones">         
            </form>
            <?php
                include('../db/registrar.php')
            ?> 
        <form class="filtro" method="post">
            <h2>Filtro:</h2>
            <label for="todo-filtro">Todo:</label>
            <input type="radio" name="filtro" id="todo-filtro" value="todo-filtro">
            <label for="abierto-filtro">Abierto:</label>
            <input type="radio" name="filtro" id="abierto-filtro" value="abierto-filtro">
            <label for="cerrado-filtro">Cerrado:</label>
            <input type="radio" name="filtro" id="cerrado-filtro" value="cerrado-filtro">
            <input type="submit" name="filtrar" value="Filtrar" class="botones">
        </div>
        <section id="table">            
            <div class="table-container">                
                <div class="table__header">BORRAR</div>
                <div class="table__header">EDITAR</div>
                <div class="table__header">FECHA</div>
                <div class="table__header">DESCRIPCION</div>
                <div class="table__header">NOMBRE</div>
                <div class="table__header">ACCIONES</div>                
                <div class="table__header">ESTADO</div>                

                <?php
                    include "../db/verIncidencias.php";                                                                                
                    while($mostrar = mysqli_fetch_array($resultado_consulta)){                        
                ?>                                                      
                    <a href="../db/eliminar.php?id=<?php echo $mostrar['id']?>" id="basura" class="table-info basura-actualizar icono">Eliminar</a>   
                    <a href="../db/modificar.php?id=<?php echo $mostrar['id']?>" id="actualizar" class="table-info basura-actualizar icono">Actualizar</a>                                                                                                                 
                    <p class="table-info"><?php echo $mostrar['fecha']?></p>            
                    <p class="table-info"><?php echo $mostrar['descripcion']?></p>            
                    <p class="table-info"><?php echo $mostrar['nombre']?></p>            
                    <p class="table-info"><?php echo $mostrar['acciones']?></p> 
                    <p class="table-info"><?php echo $mostrar['estado']?></p>                                
                <?php                       
                    }                    
                ?>                
            </div>
        </section>        
    </main>
</body>
</html>