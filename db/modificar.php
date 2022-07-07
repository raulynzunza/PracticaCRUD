<?php
    include('conexion.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "select * from accidente where id = $id";
        $result = mysqli_query($conexion,$query);
        if(mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);
            $fecha = $row['fecha'];
            $descripcion = $row['descripcion'];
            $nombre = $row['nombre'];
            $acciones = $row['acciones'];   
            $estado = $row['estado'];         
        }
    }

    if(isset($_POST['actualizar'])){
        if(strlen($_POST['fecha']) >= 1 && strlen($_POST['descripcion']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['acciones']) >= 1){
            $id = $_GET['id'];
            $fecha = trim($_POST['fecha']);
            $descripcion = trim($_POST['descripcion']);
            $nombre = trim($_POST['nombre']);
            $acciones = trim($_POST['acciones']);
            $estado = $_POST['estado'];
    
            $registros = "update accidente set fecha = '$fecha', descripcion='$descripcion', nombre = '$nombre', acciones = '$acciones', estado = '$estado' where id = $id";
            mysqli_query($conexion,$registros);        
            header("Location: ../pages/index.php");           
        } 
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Actualizar</title>
</head>
<body>
    <main id="main">
        <section>
            <h1>Registro</h1>
            <form class="formulario" action="modificar.php?id=<?php echo $_GET['id']; ?>" method="post">
                <div>
                    <label for="fecha" class="labels">Fecha:</label>
                    <input type="date" name="fecha"  required id="fecha" class="inputs" value="<?php echo $fecha ?>">
                </div>
                <div>
                    <label for="descripcion" class="labels">Descripcion:</label>
                    <input type="text" name="descripcion" required id="descripcion" class="inputs" value="<?php echo $descripcion ?>">
                </div>
                <div>
                    <label for="nombre" class="labels">Nombre:</label>
                    <input type="text" name="nombre" required id="nombre" class="inputs" value="<?php echo $nombre ?>">
                </div>                        
                <div>
                    <label for="acciones" class="labels">Acciones:</label>
                    <input type="text" minlength="10" required name="acciones" id="acciones" class="inputs" value="<?php echo $acciones ?>">
                </div>      
                <div>
                    <?php
                        switch($estado){
                            case "abierto":?>
                                <label for="abierto">Abierto:</label>
                                <input type="radio" name="estado" id="abierto" value="abierto" checked>
                                <label for="cerrado">Cerrado:</label>
                                <input type="radio" name="estado" id="cerrado" value="cerrado">
                                <?php
                                break;
                            case "cerrado":?>
                                <label for="abierto">Abierto:</label>
                                <input type="radio" name="estado" id="abierto" value="abierto">
                                <label for="cerrado">Cerrado:</label>
                                <input type="radio" name="estado" id="cerrado" value="cerrado" checked><?php
                                break;
                        }?>                             
                </div>                         
                <input type="submit" id="boton" name="actualizar" value="Actualizar">         
            </form>                      
    </main>
</body>
</html>