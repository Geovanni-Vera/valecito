<?php

if ($connect) {
    $query = "SELECT * FROM menu WHERE categoriaid = 7;";
    $resultado = $bd->query($query);
}

?>
<section class="hamburgers mt-20 " id="acompañamientos">
    <h3 class="center m-10px title">Acompañamientos</h3>
    <div class="grid">
        <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>

            <!-- Listado de hamburguesas -->
            <div class="ctn acompañamientos-ctn">
                <h4 class="capitalize"><?php echo $row['producto'] ?> <span class="sp-yellow">$<?php echo $row['precio']?></span></h4>
                <p class="descripcion capitalize"><?php echo $row['descripcion']?></p>
            </div>

        <?php endwhile; ?>
    </div>
</section>