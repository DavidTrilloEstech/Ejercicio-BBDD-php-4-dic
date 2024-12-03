<?php
    // error_reporting(0);
    require_once "conexion.php";
    
    if (isset($_POST['ok'])){
        if (isset($_POST['nombre'], $_POST['apellido'])){
            if ($_POST['nombre'] != '' && $_POST['apellido'] != ''){
                $ok = true;
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
            
                if (mysqli_query($conn, "SELECT * FROM `autores` WHERE apellido = '$apellido' AND nombre = '$nombre'")->num_rows==0){
                    $res = mysqli_query($conn, "INSERT INTO `autores` (`apellido`, `nombre`) VALUES ('$apellido' , '$nombre');");
                    
                }
            }else{
                $ok = false;
            }
            
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
        form{
            border: 1px solid black;
            margin: 0;
            margin : auto;
            display: inline-block;
            padding: 10px;
        }
        .container{
            display: inline-block;
            margin: 10px 0px;
        }
        .container div{
            padding: 5px 0px;
        }
    </style>
</head>
<body>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div>
                    <label for="apellido">Apellido</label>
                </div>
                <div>
                    <label for="nombre">Nombre</label>
                </div>
            </div>

            <div class="container">
                <div>
                    <input type="text" size="40" name="apellido" id="apellido">
                </div>
                <div>
                    <input type="text" size="40" name="nombre" id="nombre">
                </div>
            </div>
            
            <div>
                <button type="submit" name="ok" id="ok">Guardar</button>   
            </div>
        </form>
    
        <?php 
        echo "<hr>";
        if (isset($_POST['ok'])){
            if ($ok){
                if (isset($res)){
                    echo "$nombre $apellido añadido con exito";
                }else{
                    echo "$nombre $apellido ya se encontraba añadido en la base de datos";
                }
            }else {
                echo "Rellene ambos campos para registrar un autor en una base de datos";
                
            }
             
        }
        ?>
        <br>
        <a href="lista.php">Ver lista</a>
    </body>
</html>
