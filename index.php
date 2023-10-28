<?php
require 'php/config/database.php';
$bd = new Database("localhost", "elvalecito", "root", "root");
$connect = $bd->connect();

include 'php/templates/header.php';
?>

<div class="container">
    <div class="banner ur-1">

    </div>
</div>
<!-- Menú -->
<section id="menu" class="center-ctn ">

    <div class="container pd-20">
        <?php include 'php/templates/menunav.php' ?>

        <?php include 'php/templates/menu/hamburguesas.php' ?>
        <!-- hotdogs -->
        <?php include 'php/templates/menu/hotdog.php' ?>

        <!-- Alitas -->
        <?php include 'php/templates/menu/alitas.php' ?>
        <!-- Boneles -->
        <?php include 'php/templates/menu/boneless.php' ?>
        <!-- Costillas -->
        <?php include 'php/templates/menu/costillas.php' ?>

        <!-- Banderillas -->
        <?php include 'php/templates/menu/banderillas.php' ?>
        <!-- Papas Fritas -->
        <?php include 'php/templates/menu/acompañamientos.php' ?>

        <!-- Bebidas -->
        <?php include 'php/templates/menu/bebidas.php' ?>
        <!-- Malteadas -->
        <?php include 'php/templates/menu/malteadas.php' ?>
        <!-- sodas -->
        <?php include 'php/templates/menu/sodas.php' ?>
    </div>
</section>

<div class="container">
    <div class="banner ur-2">

    </div>
</div>




<?php
include 'php/templates/social_media.php';
include 'php/templates/about.php';

include 'php/templates/footer.php';
?>