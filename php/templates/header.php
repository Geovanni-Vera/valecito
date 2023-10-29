<?php
if(!isset($auth)){
    $auth = false;
}
if (!isset($_SESSION)) {
    session_start();
}
    if (isset($_SESSION['login'])) {
        
        $auth = $_SESSION['login'];
    }
    if(isset($_SESSION['name'])){
        $name = [];
        $name = $_SESSION['name'];
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Valecito - Restaurante de Snacks</title>
    <link rel="stylesheet" href="/valecito2.0/css/style.css">
</head>

<body>
    <!-- Encabezado -->
    <header class="header">
        <?php if ($auth) : ?>
            <h1 class="title">¡Bienvenido <?php echo $name ?>!</h1>
        <?php elseif (!$auth) : ?>
            <h1 class="title">¡Bienvenido a El valecito!</h1>
            <p>Tu destino para snacks deliciosos.</p>
        <?php endif; ?>
        <div>
            <?php if ($auth) : ?>
                <a href="/valecito2.0/php/cerrarsession.php" class="admin">
                    cerrar sesion
                </a>
                <a href="/valecito2.0/php/admin/index.php" class="admin">Administrador</a>
            <?php elseif (!$auth) : ?>
                <a href="/valecito2.0/login.php" class="admin">
                    iniciar sesion
                </a>

            <?php endif; ?>
            <a href="/valecito2.0/index.php" class="admin">
                inicio
            </a>

        </div>



    </header>