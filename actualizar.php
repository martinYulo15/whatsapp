<?php
include_once 'conexion.php';

if (isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="select * from contacto where id_contacto='$id'";
    $resultado=mysqli_query($con,$sql);

    if ($fila=mysqli_fetch_assoc($resultado))
    {
        //mostrar los valores
    }
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
       $id=$_POST['id'];
       $nombre=$_POST['nombre'];
       $direccion=$_POST['direccion'];
       $email=$_POST['email'];
       $tel=$_POST['tel'];
       $cel=$_POST['cel'];
       $whatsapp=$_POST['whatsapp'];

       $sql="update contacto set nombre_suc='$nombre', direccion='$direccion', email='$email', tel='$tel', cel='$cel', whatsapp='$whatsapp' where id_contacto='$id'";


       $resultado=mysqli_query($con,$sql);


       if ($resultado)
       {
          echo "<script>
                  alert('¡Contacto Actualizado con éxito!');
                  location.href='administrar.php';
                </script>";
       }
       else
       {
          echo "<script>
                    alert('No fue posible actualizar correctamente, intentelo de nuevo ...');
                    location.href='administrar.php';
                </script>";
       }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <br>
    <h3><a href="administrar.php">Regresar</a></h3>
    <center>
        <h1>Actualizar contacto</h1>
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table border=1> 
                <tr hidden>
                    <td><label for="id">ID:</label></td>
                    <td><input name="id" type="text" value="<?php echo $fila['id_contacto']  ?>" require></td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre:</label></td>
                    <td><input name="nombre" type="text" value="<?php echo $fila['nombre_suc']  ?>" require></td>
                </tr>
                <tr>
                <td><label for="direccion">Direccion:</label></td>
                    <td><input name="direccion" type="text" value="<?php echo $fila['direccion']  ?>" require></td>
                </tr>
                <tr>
                <td><label for="email">Email:</label></td>
                    <td><input name="email" type="text" value="<?php echo $fila['email']  ?>" require></td>
                </tr>
                <tr>
                <td><label for="tel">Telefono:</label></td>
                    <td><input name="tel" type="tel" value="<?php echo $fila['tel']  ?>" require></td>
                </tr>
                <tr>
                <td><label for="cel">Celular:</label></td>
                    <td><input name="cel" type="text" value="<?php echo $fila['cel']  ?>" require></td>
                </tr>
                <tr>
                <td><label for="whatsapp">Whatsapp:</label></td>
                    <td><input name="whatsapp" type="text" value="<?php echo $fila['whatsapp']  ?>" require></td>
                </tr>
                <tr>
                    <td colspan=2 ><input type="submit" name="guardar" value="Guardar"></td>
                </tr>
            </table>
            <hr>

        </form>
    </center>
</body>
</html>