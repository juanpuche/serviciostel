<?php
session_start();

// Usuarios y contraseñas (en un ambiente real, usarías una base de datos o hashes)
$users = array(
    "juanpuche" => "password_de_juanpuche",
    "usuario1" => "password_de_usuario1",
    "usuario2" => "password_de_usuario2",
    "usuario3" => "password_de_usuario3"
);

$error = "";
if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Revisamos que las credenciales estén correctas
    if(array_key_exists($username, $users) && $users[$username] == $password) {
        if($username == "juanpuche" || !in_array($username, array("usuario1", "usuario2", "usuario3"))) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: archivos_privados/");
            exit;
        } else {
            $error = "Usted no está autorizado para acceder a este directorio, favor comunicarse con el Admin: JuanPuche";
        }
    } else {
        $error = "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="post">
        Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        <input type="submit" value="Login">
    </form>
    <p><?php echo $error; ?></p>
</body>
</html>

