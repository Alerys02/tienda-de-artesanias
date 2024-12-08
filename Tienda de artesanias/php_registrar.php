<html>
<link rel="stylesheet" href="estilo.css">
    <body>

    <?php 
require ("configuracion.php");
$conexion = mysqli_connect($servidor, $usuario, $password, $bd);

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$contrasena=$_POST['contrasena'];
$email=$_POST['email'];
$edad=$_POST['edad'];

$consulta="INSERT INTO usuarios (nombre, apellido, contrasena, email, edad) VALUES ('$nombre', '$apellido', '$contrasena', '$email', '$edad')";

if ($resultado = mysqli_query($conexion, $consulta)) {
    echo "Registro guardado con éxito.";
} else {
    echo "Error al guardar el registro: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>


</body>
</html>
