<?php
$auth = false;
if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['login']))
{
    $auth = $_SESSION['login'];
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
        <div>
            <?php if ($auth) : ?>
                <a href="/valecito2.0/php/cerrarsession.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                        <path d="M22 22l-5 -5" />
                        <path d="M17 22l5 -5" />
                    </svg>
                </a>
                <a href="/valecito2.0/php/admin/index.php" class="admin">ir a Admin</a>
            <?php elseif (!$auth) : ?>
                <a href="/valecito2.0/login.php">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </a>

            <?php endif; ?>

        </div>
        <h1>¡Bienvenido a El valecito!</h1>
        <p>Tu destino para snacks deliciosos.</p>
        <a href="/valecito2.0/index.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M10 12h4v4h-4z" />
            </svg>
        </a>

    </header>