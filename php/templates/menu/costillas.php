<?php

if ($connect) {
    $query = "SELECT * FROM menu WHERE categoriaid = 5;";
    $resultado = $bd->query($query);
}

?>
<section id="costillas">
    <h3 class="center class title">Costillas</h3>
    <div class="grid">
        <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) : ?>

            <!-- Listado de hamburguesas -->
            <div class="ctn costillas-ctn">
                <h4 class="capitalize"><?php echo $row['producto'] ?> <span class="sp-yellow">$<?php echo $row['precio'] ?></span></h4>
                <p class="descripcion"><?php echo $row['descripcion'] ?></p>
            </div>

        <?php endwhile; ?>
    </div>
</section>