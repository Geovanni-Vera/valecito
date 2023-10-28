<?php

if ($connect) {
    $query = "SELECT * FROM menu WHERE categoriaid = 10;";
    $resultado = $bd->query($query);
}

?>
<section class="sodas mt-20 " id="soda italiana">
    <h3 class="center class title">sodas italianas</h3>
    <div class="grid">
        <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>

            <!-- Listado de hamburguesas -->
            <div class="ctn masodas-ctn">
                <h4 class="capitalize"><?php echo $row['producto'] ?> <span class="sp-yellow">$<?php echo $row['precio']?></span></h4>
                <p class="descripcion"><?php echo $row['descripcion']?></p>
            </div>

        <?php endwhile; ?>
    </div>
</section>