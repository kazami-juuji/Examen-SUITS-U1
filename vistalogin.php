<?php
    require_once "./app/config/dependencias.php";
    
?>
<?php
session_start(); // Iniciar sesión para acceder a los datos

// Verificar si el usuario está registrado
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirigir si no está autenticado
    exit();
}

// Inicializar una lista de productos si aún no está creada
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = []; // Crear una lista vacía
}

// Manejar el registro del producto
if (isset($_POST['registroProducto'])) {
    // Obtener los datos del formulario
    $producto = htmlspecialchars($_POST['producto']);
    $precio = htmlspecialchars($_POST['precio']);

    // Agregar el producto a la lista de productos en la sesión
    $_SESSION['productos'][] = [
        'nombre' => $producto,
        'precio' => $precio
    ];
}

// Manejar cierre de sesión
if (isset($_POST['logout'])) {
    session_unset(); // Libera la sesión actual
    session_destroy(); // Destruir la sesión
    header("Location: login.php"); // Redirigir al login
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS.'main2.css'?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>Usuario Registrado</title>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h2>Bienvenido querido usuario, <?= htmlspecialchars($_SESSION['nombre']) . ' '; ?></h2>

            <!-- Formulario para registrar producto -->
            <form action="" method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <p>¿Qué producto quiere ingresar?</p>
                    <input type="text" name="producto" placeholder="Nombre del producto" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <p>¿Cuál es su precio unitario?</p>
                    <input type="number" name="precio" placeholder="Precio unitario" required>
                </div><br>
                <button type="submit" name="registroProducto">Registrar Producto</button>
            </form>

            <!-- Formulario separado para mostrar la lista de productos -->
            <form action="" method="POST">
                <br><br>
                <button type="submit" name="mostrarLista">Lista de productos</button>
            </form>

            <!-- Mostrar lista de productos si se presiona el botón -->
            <?php if (isset($_POST['mostrarLista'])): ?>
                <h3>Lista de productos registrados:</h3>
                <?php if (!empty($_SESSION['productos'])): ?>
                    <ul>
                        <?php foreach ($_SESSION['productos'] as $producto): ?>
                            <li>Producto: <?= htmlspecialchars($producto['nombre']) ?> - Precio: $<?= htmlspecialchars($producto['precio']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>No hay productos registrados.</p>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Botón para cerrar sesión -->
            <form action="" method="POST">
                <br><br><br><br>
                <button type="submit" name="logout">Cerrar Sesión</button>
            </form>
        </div>
    </div>

</body>
</html>
