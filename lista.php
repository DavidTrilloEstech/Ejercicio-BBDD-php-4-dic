<?php
    error_reporting(0);
    require_once "conexion.php";

    $res = mysqli_query($conn, "SELECT * FROM autores ORDER BY apellido");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    
    <?php 
        if ($conn->affected_rows==0){
            echo "<p>No hay ningún autor en la base de datos</p>";
        }else{
            echo "<table border='1'>
        <tr>
            <th>Autores</th>
        </tr>";
        while ($row = $res->fetch_assoc()){
            echo '<tr><td>' . $row['apellido'].'('.$row['nombre'].')'.' </td></tr>';
        }
        
        }
    ?>
        
        
        

    </table>
    <p><a href="introducir.php">Introducir un nuevo autor</a></p>
    </div>
    
    
</body>
</html>