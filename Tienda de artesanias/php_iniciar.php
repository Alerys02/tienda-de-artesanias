<html>
<link rel="stylesheet" href="estilo.css">
    <body>
    <?php 

require ("configuracion.php");
if (!$conexion = mysqli_connect($servidor, $usuario, $password, $bd)) {
    die("Error de conexión: " . mysqli_connect_error());
}

 $email = mysqli_real_escape_string($conexion, $_POST['email']);
 $contrasena = $_POST['contrasena'];

 $stmt = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE email=? AND contrasena=?");
 mysqli_stmt_bind_param($stmt, "ss", $email, $contrasena);
 mysqli_stmt_execute($stmt);
 $resultado = mysqli_stmt_get_result($stmt);

 if (mysqli_num_rows($resultado) > 0) {
    
    session_start();
    
    $_SESSION['usuario'] = $email; // Por ejemplo
        header('Location: tienda_usuario.html');
        exit();
    } else {
        echo "Nombre de usuario o contraseña incorrectos";
    }
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>

</body>
</html>