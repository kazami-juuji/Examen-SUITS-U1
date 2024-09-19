<?php
    // Incluye el archivo "dependencias.php" que carga dependencias necesarias, como constantes para rutas de archivos CSS
    require_once "./app/config/dependencias.php";
    
    // Incluye el archivo "registros.php" que probablemente contiene la lógica para manejar registros de usuarios
    require_once "./app/controller/registros.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Define el juego de caracteres como UTF-8 -->
    <meta charset="UTF-8">

    <!-- Configura la vista para dispositivos móviles, asegurando que la página sea responsiva -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlaza el archivo de estilos CSS utilizando la constante CSS definida en dependencias.php -->
    <link rel="stylesheet" href="<?=CSS.'style.css'?>">

    <!-- Título de la página -->
    <title>Registro</title>
</head>

<body>
    <!-- Encabezado principal de la página -->
    <h1>Registro de usuarios</h1>

    <!-- Formulario para mostrar los datos del usuario registrado -->
    <form action="vistadatos.php" method="POST">
        <!-- Muestra el nombre del usuario registrado -->
        <p><?=$nombre?></p>
        
        <!-- Muestra el apellido del usuario registrado -->
        <p><?=$apellido?></p>
        
        <!-- Muestra el teléfono del usuario registrado -->
        <p><?=$telefono?></p>

        <!-- Enlace para regresar a la página anterior -->
        <!-- Nota: El enlace tiene un error; debería ser sólo un atributo 'href' -->
        <a class="btn btn-warning w-100" href="index2.php">Regresar</a>
    </form>
</body>

</html>
