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

        <?php include 'php/templates/menu/menu.php' ?>
        <!-- hotdogs -->
        
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