<?php

    require_once "./app/config/dependencias.php";
?>
<?php
session_start(); 

$message = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['apellido'] = $_POST['apellido'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password']; 
        header("Location: login.php");
        exit();
    } else {
        $message = "Por favor, completa todos los campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS.'main2.css'?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- Fuente Montserrat -->
    <title>Registro</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Registro</h2>
            <?php if ($message): ?>
                <p style="color:red;"><?= $message ?></p>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="apellido" placeholder="Apellido" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Registrar</button>
            </form>
            <p>¿Ya estas registrado? <a href="login.php">Inicia sesión aquí</a></p>
        </div>
    </div>
</body>
</html>
